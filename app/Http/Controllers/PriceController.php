<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Department;
use App\Models\District;
use App\Models\Price;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $precios = Price::where("status", "=", true)->get();

        $departamentos = DB::table('departments')->get();
        $provincias = DB::table('provinces')->get();
        $distritos = DB::table('districts')->get();

        return view('pages.prices.index', compact('precios', 'departamentos', 'provincias', 'distritos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function save(Request $request, $priceId = 0)
    {
        $price = Price::with(['district', 'district.province', 'district.province.department'])->find($priceId);
        // $distrito = District::find($price->distrito_id);
        // $provincia = Province::find($distrito->province_id);
        // $departmento = Department::find($provincia->department_id);
        // dd($price->district);
        if (!$price) {
            $price = new Price();
            $price->district = new District();
            $price->district->province = new Province();
            $price->district->province->department = new Department();
        }

        $departments = Department::all();
        
        if ($price) {
            $provinces = Province::where('department_id', (string) $price->district->province->department->id)->get();

            $districts = District::where('province_id', (string) $price->district->province->id)->get();
        }

       
         return view('pages.prices.save', compact('departments', 'provinces', 'districts', 'price'));
    }

    public function getProvincias(Request $request)
    {
        //
        //traemos las provincias de la tabla

        $provincias = DB::table('provinces')
            ->where('department_id', '=', $request->id)
            ->get();

        return response()->json($provincias);
    }
    public function getDistrito(Request $request)
    {
        //
        //traemos las provincias de la tabla

        $distritos = DB::table('districts')
            ->where('province_id', '=', $request->id)
            ->get();

        return response()->json($distritos);
    }
    public function calculeEnvio(Request $request)
    {

        $LocalidadParaEnvio = Price::where('distrito_id', $request->id)->where("status", true)->get();
        return response()->json(['message' => 'LLegando Correctamente', 'LocalidadParaEnvio' => $LocalidadParaEnvio]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'price' => 'required'
        ]);

         // Determinar si es local o no
        $isLocal = ($request->departamento_id == 15 && $request->provincia_id == 1501) ? 1 : 0;

        // Crear los datos que se usarán para crear o actualizar
        $data = [
            'price' => $request->price,
            'status' => 1,
            'visble' => 1,
            'local' => $isLocal,
        ];

        // Buscar el registro por distrito_id
        $jpa = Price::where('distrito_id', $request->distrito_id)->first();

        if (!$jpa) {
            // Crear nuevo registro si no existe
            $data['distrito_id'] = $request->distrito_id;
            Price::create($data);
        } else {
            // Actualizar registro existente
            $jpa->update($data);
        }

        
        // $price->save();

        return redirect()->route('prices.index')->with('success', 'Servicio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePriceRequest $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    
     public function deletePrice(Request $request){
        $price = Price::find($request->id);
        // $price->status = 0;
        $price->delete();
        return response()->json(['message' => 'Costo de envio eliminado correctamente']);
     }

     public function updateVisible(Request $request)
    {
        // Lógica para manejar la solicitud AJAX
        //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
        $id = $request->id;

        $field = $request->field;

        $status = $request->status;

        $service = Price::findOrFail($id);

        $service->$field = $status;

        $service->save();

        return response()->json(['message' => 'Costo de envio modificado.']);
    }
}
