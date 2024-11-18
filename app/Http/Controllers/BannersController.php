<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Str;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $banners = Banners::all();
        return view('pages.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $banners = new Banners();
        return view('pages.banners.save' , compact('banners'))  ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $body = $request->all();
        $jpa = Banners::find($request->id);
        if (!$jpa) {
            $body['status'] = true;
            $banner =   Banners::create($body);
         
            $banner->image = $this->saveImg($request, 'image');
            $banner->price = $this->saveImg($request, 'price');
            $banner->save();
          
        } else {

            if(!$request->hasFile('image')) {
                $body['image'] = $jpa->image;
            } else {
                $body['image'] = $this->saveImg($request, 'image');
            }

            if(!$request->hasFile('price')) {
              $body['price'] = $jpa->image;
            } else {
              $body['price'] = $this->saveImg($request, 'price');
            }
            

            $jpa->update($body);
        }
        return redirect()->route('banners.index')->with('success', 'Banner creado correctamente');
    }

    private function saveImg(Request $request, string $field)
  {
    if ($request->hasFile($field)) {
      $file = $request->file($field);
      $route = 'storage/images/imagen/';
      $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
      $manager = new ImageManager(new Driver());
      $img =  $manager->read($file);
      // $img->coverDown(340, 340, 'center');

      if (!file_exists($route)) {
        mkdir($route, 0777, true);
      }

      $img->save($route . $nombreImagen);
      return $route . $nombreImagen;
    }
    return 'images\img\noimagen.jpg';
  }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $banners = Banners::findOrfail($id);
        return view('pages.banners.save', compact('banners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function deleteBanner(Request $request)
    {
        $banner = Banners::find($request->id);
        $banner->delete();
        return response()->json(['success' => 'Banner eliminado correctamente']);
    }
    public function updateVisible(Request $request)
  {
    $id = $request->id;
    $field = $request->field;
    $status = $request->status;

    // Verificar si el producto existe
    $banner = Banners::find($id);

    if (!$banner) {
      return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    // Actualizar el campo dinámicamente
    $banner->update([
      $field => $status
    ]);
    return response()->json(['message' => 'registro actualizado']);
  }
}
