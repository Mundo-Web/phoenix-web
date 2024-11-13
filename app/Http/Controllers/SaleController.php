<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Classes\dxResponse;
use App\Models\dxDataGrid;
use App\Models\Price;
use App\Models\Products;
use App\Models\SaleDetail;
use App\Models\Status;
use App\Models\User;
use SoDe\Extend\JSON;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use SoDe\Extend\Response;
use Throwable;

class SaleController extends Controller
{

    public function index(Request $request)
    {
        $statuses = Status::all();
        return view('pages.pedidos.index')
            ->with('statuses', $statuses);
    }

    public function save(Request $request)
    {
        $response = Response::simpleTryCatch(function () use ($request) {
            $user = Auth::user();
            
            $cart = ProductsController::process($request->cart);
            $address = $request->address;
            $priceJpa = Price::find($address['price_id'] ?? null);

            $delivery = 0;
            if ($priceJpa) {
                $delivery = $priceJpa->price;
            }

            $microtime = microtime(true);
            $fechaActual = date('YmdHis');
            $microsegundos = sprintf("%06d", ($microtime - floor($microtime)) * 1000000);
            $orderId = $fechaActual . $microsegundos;

            $saleJpa = new Sale();
            $saleJpa->code = $orderId;
            $saleJpa->name = $user->name ?? '-';
            $saleJpa->lastname = $user->lastname ?? '-';
            $saleJpa->email = $user->email ?? '-';
            $saleJpa->phone = $user->phone ?? '-';
            $saleJpa->address_department = $address['department'] ?? '-';
            $saleJpa->address_province = $address['province'] ?? '-';
            $saleJpa->address_district = $address['district'] ?? '-';
            $saleJpa->address_price = $delivery;
            $saleJpa->address_street = $address['street'] ?? '-';
            $saleJpa->address_number = $address['number'] ?? '-';
            $saleJpa->address_description = $address['description'] ?? '-';
            $saleJpa->total = array_sum(array_map(fn($item) => $item['totalPrice'], $cart));
            $saleJpa->status_id = 1;
            $saleJpa->status_message = 'La orden ha sido creada - Aún no se ha realizado un pago';
            $saleJpa->save();

            foreach ($cart as $item) {
                $detailJpa = new SaleDetail();
                $detailJpa->sale_id = $saleJpa->id;
                $detailJpa->product_image = $item['imagen'];
                $detailJpa->product_name = $item['producto'];
                $detailJpa->quantity = $item['cantidad'];
                $detailJpa->price = $item['precio'];
                $detailJpa->final_price = $item['totalPrice'];
                $detailJpa->product_color = $item['color'];
                $detailJpa->talla = $item['peso'];
                $detailJpa->save();
            }
            return $saleJpa;
        });

        return \response($response->toArray(), $response->status);
    }

    public function updateBilling(Request $request) {
        $response = Response::simpleTryCatch(function () use ($request) {
            $saleJpa = Sale::where('code', $request->ordenId)->first();
            $saleJpa->phone = $request->phone;
            $saleJpa->tipo_comprobante = $request->billing_type;
            $saleJpa->doc_number = $request->billing_number;
            $saleJpa->razon_fact = $request->billing_name;
            $saleJpa->direccion_fact = $request->billing_address;
            $saleJpa->save();
        });

        return response($response->toArray(), $response->status);
    }

    public function paginate(Request $request): HttpResponse|ResponseFactory
    {
        $response =  new dxResponse();
        try {
            $instance = Sale::select()->with('status');

            if ($request->group != null) {
                [$grouping] = $request->group;
                $selector = \str_replace('.', '__', $grouping['selector']);
                $instance = Sale::select([
                    "{$selector} AS key"
                ])->with('status')
                    ->groupBy($selector);
            }

            if (!Auth::user()->hasRole('Admin') || $request->data == 'mine') {
                $instance->where('email', Auth::user()->email);
            }

            if ($request->filter) {
                $instance->where(function ($query) use ($request) {
                    dxDataGrid::filter($query, $request->filter ?? []);
                });
            }

            if ($request->sort != null) {
                foreach ($request->sort as $sorting) {
                    $selector = \str_replace('.', '__', $sorting['selector']);
                    $instance->orderBy(
                        $selector,
                        $sorting['desc'] ? 'DESC' : 'ASC'
                    );
                }
            } else {
                $instance->orderBy('id', 'DESC');
            }

            $totalCount = 0;
            if ($request->requireTotalCount) {
                $totalCount = $instance->count('*');
            }

            $jpas = [];
            if (!$request->ignoreData) {
                $jpas = $request->isLoadingAll
                    ? $instance->get()
                    : $instance
                    ->skip($request->skip ?? 0)
                    ->take($request->take ?? 10)
                    ->get();
            }

            $results = [];

            foreach ($jpas as $jpa) {
                $result = JSON::unflatten($jpa->toArray(), '__');
                $results[] = $result;
            }

            $response->status = 200;
            $response->message = 'Operación correcta';
            $response->data = $results;
            $response->totalCount = $totalCount;
        } catch (\Throwable $th) {
            $response->status = 400;
            $response->message = $th->getMessage() . " " . $th->getFile() . ' Ln.' . $th->getLine();
        } finally {
            return response(
                $response->toArray(),
                $response->status
            );
        }
    }

    public function confirmation(Request $request): HttpResponse|ResponseFactory
    {
        $response =  new Response();
        try {
            $sale = Sale::findOrfail($request->id);

            if ($request->field == 'client') {
                $sale->confirmation_client = true;
                $sale->confirmation_user = true;
            } else if ($request->field == 'user') {
                $sale->confirmation_user = true;
                if (!User::where('email', $sale->email)->exists()) {
                    $sale->confirmation_client = true;
                }
            }

            $sale->save();

            $response->status = 200;
            $response->message = 'Operación correcta';
        } catch (Throwable $th) {
            $response->status = 400;
            $response->message = $th->getMessage();
        } finally {
            return response(
                $response->toArray(),
                $response->status
            );
        }
    }

    public function status(Request $request): HttpResponse|ResponseFactory
    {
        $response =  new Response();
        try {
            $sale = Sale::findOrfail($request->id);

            $sale->status_id = $request->status_id;
            $sale->save();

            $response->status = 200;
            $response->message = 'Operación correcta';
        } catch (Throwable $th) {
            $response->status = 400;
            $response->message = $th->getMessage();
        } finally {
            return response(
                $response->toArray(),
                $response->status
            );
        }
    }
}
