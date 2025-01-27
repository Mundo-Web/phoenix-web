<?php

namespace App\Http\Controllers;

use App\Models\TemporalyImage;
use App\Http\Requests\StoreTemporalyImageRequest;
use App\Http\Requests\UpdateTemporalyImageRequest;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Files\TemporaryFile;

class TemporalyImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTemporalyImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TemporalyImage $temporalyImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TemporalyImage $temporalyImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTemporalyImageRequest $request, TemporalyImage $temporalyImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemporalyImage $temporalyImage)
    {
        //
    }

    public function uploadvoucher(Request $request)
    {   
        $body = $request->all();
        
        if ($request->hasFile("voucher")) {

            $file = $request->file('voucher');
            $extension = $file->getClientOriginalExtension();
        
            // Generar un nombre único para el archivo
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
            $ruta = 'storage/images/tmp/';
        
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); // Crear con permisos de lectura, escritura y ejecución
            }
        
            // Verificar la extensión del archivo
            if ($extension === 'svg') {
                $file->move($ruta, $nombreImagen);
            } else {
                // Manejar las imágenes rasterizadas (JPEG, PNG, etc.)
                $manager = new ImageManager(Driver::class);
                $img = $manager->read($file);
                $img->save($ruta . $nombreImagen);
            }
        
            // Guardar información del archivo en el cuerpo de la solicitud
            $body['folder'] = $ruta;
            $body['filename'] = $nombreImagen;

            TemporalyImage::create($body);

            return $nombreImagen;
        }
    }

    public function deletevoucher(Request $request)
    {
       $filename = request()->getContent();
       $temporalyImage = TemporalyImage::where('filename', $filename)->first();
       $ruta = 'storage/images/tmp/';
       
       if ($temporalyImage) {
            $ruta = 'storage/images/tmp/';

            // Verificar si el archivo existe
            if (File::exists($ruta . $temporalyImage->filename)) {
                File::delete($ruta . $temporalyImage->filename); // Eliminar archivo físico
            }

            // Eliminar registro de la base de datos
            $temporalyImage->delete();

            return response()->json(['message' => 'Archivo eliminado correctamente.'], 200);
        }
       
        return response()->json(['message' => 'Archivo no encontrado.'], 404);
    }
}
