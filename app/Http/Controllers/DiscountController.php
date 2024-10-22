<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\DiscountType;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // $attributes = Attributes::where("status", "=", true)->get(); // actualizar a where status = 1 
    $reglasDescuento =  Discount::select()
      ->where("status", true)
      ->get();
    return view('pages.discounts.index', compact('reglasDescuento'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $reglasDescuento = DiscountType::all();
    return view('pages.discounts.create', compact('reglasDescuento'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
    ]);

    $reglasDescuento = new Discount();

    try {

      $reglasDescuento->name = $request->name;
      $reglasDescuento->take_product = $request->take_product;
      $reglasDescuento->payment_product = $request->payment_product;
      $reglasDescuento->type_id = $request->type_id;
      $reglasDescuento->apply_to = $request->apply_to;
      $reglasDescuento->save();

      return redirect()->route('reglasDescuentos.index')->with('success', 'Publicación creado exitosamente.');
    } catch (\Throwable $th) {
      return response()->json(['messge' => 'Verifique sus datos ' . $th], 400);
    }
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
  public function edit(Request $request, string $id)
  {

    $tipodescuento = DiscountType::all();
    $reglasDescuento = Discount::where('status', '=', true)->where('visible', '=', true)->where('id', '=', $id)->first();
    if (!$reglasDescuento) {
      return redirect()->back()->with('error', 'Descuento no encontrado.');
    }
    return view('pages.discounts.edit', compact('tipodescuento', 'reglasDescuento'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'name' => 'required',

    ]);
    $reglasDescuento = Discount::find($id);
    try {

      $reglasDescuento->name = $request->name;
      $reglasDescuento->take_product = $request->take_product;
      $reglasDescuento->payment_product = $request->payment_product;
      $reglasDescuento->type_id = $request->type_id;
      $reglasDescuento->apply_to = $request->apply_to;
      $reglasDescuento->save();

      return redirect()->route('reglasDescuentos.index')->with('success', 'Publicación modificada exitosamente.');
    } catch (\Throwable $th) {

      return response()->json(['messge' => 'Verifique sus datos ' . $th], 400);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function deletereglasDescuentos(Request $request)
  {
    $id = $request->id;
    $service = Discount::findOrfail($id);

    $service->status = false;

    $service->save();
    return response()->json(['message' => 'Registro eliminado.']);
  }

  public function updateVisible(Request $request)
  {
    // Lógica para manejar la solicitud AJAX
    //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
    try {
      $id = $request->id;

      $status = $request->status;

      $testimony = Discount::findOrFail($id);

      $testimony->visible = $status;

      $testimony->save();

      return response()->json(['message' => 'Estado modificado.']);
    } catch (\Throwable $th) {
      return response()->json(['message' => $th], 400);
    }
  }
}
