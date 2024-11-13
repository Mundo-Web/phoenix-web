<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::where("status", "=", true)->orderBy('order', 'asc')->get();

        return view('pages.sliders.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

       
        $slider = new Slider();


        if ($request->hasFile("imagen")) {

            $manager = new ImageManager(new Driver());

            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img =  $manager->read($request->file('imagen'));
            // $img->coverDown(968, 351, 'center');
            $ruta = 'storage/images/slider/';
           
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
            }
            
            $img->save($ruta.$nombreImagen);

            $slider ->url_image = $ruta;
            $slider ->name_image = $nombreImagen;
        }

        if ($request->hasFile("link1")) {

            $manager = new ImageManager(new Driver());

            $nombreImagen = Str::random(10) . '_' . $request->file('link1')->getClientOriginalName();
            $img =  $manager->read($request->file('link1'));
            $ruta = 'storage/images/slider/';
           
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); 
            }
            
            $img->save($ruta.$nombreImagen);
            $slider->link1 = $ruta.$nombreImagen;
            
        }

        $slider ->botontext1 = $request->botontext1;
        $slider ->botontext2 = $request->botontext2;
        $slider ->link2 = $request->link2;
        $slider ->title = $request->title;
        $slider ->description = $request->description;
        $slider ->order = $request->order;
        


        $slider ->save();

        return redirect()->route('slider.index')->with('success', 'Slider creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
      
        $slider = Slider::find($id);

        return view('pages.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrfail($id);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider ->botontext1 = $request->botontext1;
        $slider ->link1 = $request->link1;
        $slider ->botontext2 = $request->botontext2;
        $slider ->link2 = $request->link2;
        $slider ->order = $request->order;
       

        if ($request->hasFile("imagen")) {

            $manager = new ImageManager(new Driver());
            $ruta = storage_path() . '/app/public/images/slider/' . $slider->name_image;

            if (File::exists($ruta)) {
                File::delete($ruta);
            }

            $rutanueva = 'storage/images/slider/';
            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img =  $manager->read($request->file('imagen'));
           
            if (!file_exists($rutanueva)) {
                mkdir($rutanueva, 0777, true); 
            }
            
            $img->save($rutanueva . $nombreImagen);
            $slider->url_image = $rutanueva;
            $slider->name_image = $nombreImagen;
        }


        if ($request->hasFile("imagemobile")) {

            $manager = new ImageManager(new Driver());
            $ruta =  $slider->link1;

            if (File::exists($ruta)) {
                File::delete($ruta);
            }

            $nombreImagen = Str::random(10) . '_' . $request->file('imagemobile')->getClientOriginalName();
            $img =  $manager->read($request->file('imagemobile'));
            $ruta = 'storage/images/slider/';
           
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); 
            }
            
            $img->save($ruta.$nombreImagen);

            $slider->link1 = $ruta.$nombreImagen;
            
        }



        $slider->update();

        return redirect()->route('slider.index')->with('success', 'Slider actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }



    
    public function deleteSlider(Request $request)
    {
        //Recupero el id mandado mediante ajax
        $id = $request->id;
        //Busco el servicio con id como parametro
        $service = Slider::findOrfail($id);
        //Modifico el status a false
        $service->status = false;
        //Guardo 
        $service->save();

        // Devuelvo una respuesta JSON u otra respuesta según necesites
        return response()->json(['message' => 'Slider eliminado.']);
    }



    public function updateVisible(Request $request)
    {
        // Lógica para manejar la solicitud AJAX
        //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
        $id = $request->id;

        $field = $request->field;

        $status = $request->status;

        $service = Slider::findOrFail($id);

        $service->$field = $status;

        $service->save();

        return response()->json(['message' => 'Slider eliminado.']);
    }
}
