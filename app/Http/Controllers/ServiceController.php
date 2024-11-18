<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\ClientLogos;
use App\Models\General;
use App\Models\Service;
use Illuminate\Http\Request;

//use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
//use Illuminate\Support\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;



class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $servicios = Service::where("status", "=", true)->get();

        return view('pages.service.index', compact('servicios'));
    }


    public function mostrarFront()
    {
        $servicios = Service::where("status", "=", true)->get();
        $logos = ClientLogos::where("status", "=", true)->get();
        $generales = General::where('id', '=', 1 )->get();
        return view('public.index', compact('servicios', 'logos', 'generales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        //tamaño imagenes 808x445 
        $service = new Service();


        if ($request->hasFile("imagen")) {

            $manager = new ImageManager(new Driver());

            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img =  $manager->read($request->file('imagen'));
            // $img->coverDown(968, 351, 'center');
            $ruta = 'storage/images/logosfooter/';
           
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
            }
            
            $img->save($ruta.$nombreImagen);

            $service ->url_image = $ruta;
            $service ->name_image = $nombreImagen;
        }

        $service->link = $request->link;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->status = 1;
        $service->visible = 1;


        $service->save();

        return redirect()->route('servicios.index')->with('success', 'Servicio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service, $id)
    {

        $servicios = Service::find($id);

        return view('pages.service.edit', compact('servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $service = Service::findOrfail($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->link = $request->link;
       

        if ($request->hasFile("imagen")) {

            $manager = new ImageManager(new Driver());
            $ruta = storage_path() . '/app/public/images/logosfooter/' . $service->name_image;

            if (File::exists($ruta)) {
                File::delete($ruta);
            }

            $rutanueva = 'storage/images/logosfooter/';
            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img =  $manager->read($request->file('imagen'));
           
            if (!file_exists($rutanueva)) {
                mkdir($rutanueva, 0777, true); 
            }
            
            $img->save($rutanueva . $nombreImagen);
            $service->url_image = $rutanueva;
            $service->name_image = $nombreImagen;
        }



        $service->update();

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrfail($id);



        $service->status = false;


        $service->save();

        // $service = update(['status' => false]);
        // $ruta = storage_path() .'/app/public/images/servicios/'. $service->name_image; 

        // if(File::exists($ruta))
        // {
        //     File::delete($ruta);
        // }

        // $service->delete();    
        // return redirect()->route('servicios.index')->with('success', 'Servicio eliminado exitosamente.');
    }


    public function deleteService(Request $request)
    {
        //Recupero el id mandado mediante ajax
        $id = $request->id;
        //Busco el servicio con id como parametro
        $service = Service::findOrfail($id);
        //Modifico el status a false
        $service->status = false;
        //Guardo 
        $service->save();

        // Devuelvo una respuesta JSON u otra respuesta según necesites
        return response()->json(['message' => 'Servicio eliminado.']);
    }



    public function updateVisible(Request $request)
    {
        // Lógica para manejar la solicitud AJAX
        //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
        $id = $request->id;

        $field = $request->field;

        $status = $request->status;

        $service = Service::findOrFail($id);

        $service->$field = $status;

        $service->save();

        return response()->json(['message' => 'Servicio eliminado.']);
    }
}
