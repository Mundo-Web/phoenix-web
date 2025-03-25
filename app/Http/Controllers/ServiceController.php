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
        $servicios = Service::where("status", "=", true)
        ->orderByRaw("CASE WHEN `order` IS NULL THEN 1 ELSE 0 END, `order` ASC")
        ->orderByDesc('created_at')
        ->get();

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

            $imagen = $request->file("imagen");
            $nombreImagen = Str::random(10) . '_' . $imagen->getClientOriginalName();
            $ruta = 'storage/images/service/';
        
            // Verificar si la carpeta existe, si no, crearla
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }
        
            // Obtener la extensión del archivo
            $extension = $imagen->getClientOriginalExtension();
        
            if ($extension === 'svg') {
                // Guardar SVG directamente sin intervención de la librería de imágenes
                $imagen->move($ruta, $nombreImagen);
            } else {
                // Procesar imágenes que no sean SVG con Intervention Image
                $manager = new ImageManager(new Driver());
                $img = $manager->read($imagen);
                $img->save($ruta . $nombreImagen);
            }
        
            // Guardar los datos en el modelo
            $service->url_image = $ruta;
            $service->name_image = $nombreImagen;
        }

        $service->link = $request->link;
        $service->namebutton = $request->namebutton;
        $service->title = $request->title;
        $service->order = $request->order;
        $service->description = $request->description;
        $service->status = 1;
        $service->visible = 1;


        $service->save();

        return redirect()->route('servicios.index')->with('success', 'Item creado exitosamente.');
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
        $service->order = $request->order;
        $service->namebutton = $request->namebutton;
       

        if ($request->hasFile("imagen")) {

            $imagen = $request->file("imagen");
            $nombreImagen = Str::random(10) . '_' . $imagen->getClientOriginalName();
            $ruta = 'storage/images/service/';
        
            // Eliminar la imagen anterior si existe
            if ($service->name_image) {
                $rutaImagenAnterior = $service->url_image . $service->name_image;
                if (file_exists($rutaImagenAnterior)) {
                    unlink($rutaImagenAnterior);
                }
            }
        
            // Verificar si la carpeta existe, si no, crearla
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }
        
            // Obtener la extensión del archivo
            $extension = $imagen->getClientOriginalExtension();
        
            if ($extension === 'svg') {
                // Guardar SVG directamente sin procesarlo con Intervention Image
                $imagen->move($ruta, $nombreImagen);
            } else {
                // Procesar imágenes rasterizadas con Intervention Image
                $manager = new ImageManager(new Driver());
                $img = $manager->read($imagen);
                $img->save($ruta . $nombreImagen);
            }
        
            // Actualizar el modelo con la nueva imagen
            $service->url_image = $ruta;
            $service->name_image = $nombreImagen;
            $service->save();
        }

        $service->update();

        return redirect()->route('servicios.index')->with('success', 'Item actualizado exitosamente.');
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
        return response()->json(['message' => 'Item eliminado.']);
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

        return response()->json(['message' => 'Item eliminado.']);
    }
}
