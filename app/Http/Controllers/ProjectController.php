<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();

        return view('pages.project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveImg($file, $route, $nombreImagen)
    {
        $manager = new ImageManager(new Driver());
        $img =  $manager->read($file);


        if (!file_exists($route)) {
        mkdir($route, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
        }

        $img->save($route . $nombreImagen);
    }
  
    public function store(Project $request)
    {
        $request->validate([
            'titulo' => 'required',
          ]);
      
          $project = new Project();
          try {
      
            if ($request->hasFile("imagen")) {
              $file = $request->file('imagen');
              $routeImg = 'storage/images/project/';
              $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
      
              $this->saveImg($file, $routeImg, $nombreImagen);
      
              $project->imagen = $routeImg . $nombreImagen;
             
            }
      
            $project->titulo = $request->titulo;
            $project->descripcion = $request->descripcion;
            $project->save();
      
            return redirect()->route('project.index')->with('success', 'Proyecto creado exitosamente.');
          } catch (\Throwable $th) {
            return response()->json(['messge' => 'Verifique sus datos '], 400);
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);

        return view('pages.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required',
          ]);
              $project = Project::find($id);
              try {
                  
                  if ($request->hasFile("imagen")) {
                      $file = $request->file('imagen');
                      $routeImg = 'storage/images/project/';
                      $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
      
                      $this->saveImg($file, $routeImg, $nombreImagen);
          
                      $project->imagen = $routeImg.$nombreImagen;
                      // $aboutUs->name_image = $nombreImagen;
                  }
          
                  $project->titulo = $request->titulo;
                  $project->descripcion = $request->descripcion;
                  $project->save();
      
                  return redirect()->route('project.index')->with('success', 'Proyecto actualizado exitosamente.');
      
      
              } catch (\Throwable $th) {
                  return response()->json(['messge' => 'Verifique sus datos '], 400); 
              }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }

    public function borrar(Request $request)
    {
      $project = Project::find($request->id);
  
          
          if ($project->imagen && file_exists($project->imagen)) {
              unlink($project->imagen);
          }
  
          $project->delete();
          return response()->json(['message'=>'Proyecto eliminado']);
    }
  
    public function updateVisible(Request $request)
    {
      
      $id = $request->id;
      $stauts = $request->status;
      $staff = Project::find($id);
      $staff->status = $stauts;
  
      $staff->save();
      return response()->json(['message' => 'Proyecto actualizado']);
    }
}
