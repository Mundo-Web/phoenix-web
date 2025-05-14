<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Offer;
use App\Models\Price;
use App\Models\Products;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\User;
use Culqi\Culqi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SoDe\Extend\Array2;
use SoDe\Extend\JSON;
use SoDe\Extend\Math;
use SoDe\Extend\Response;

class PaymentController extends Controller
{
  public function culqi(Request $request)
  {
    $response = Response::simpleTryCatch(function () use ($request) {
      $userJpa = User::where('email', $request->email)->first();
      if (!$userJpa) throw new Exception('No existe un usuario con el correo ' . $request->email);

      $culqi = new Culqi(['api_key' => env('CQ_PRIVATE_KEY')]);

      $itemJpa = Products::find($request->productId);
      if (!$itemJpa) throw new Exception('El producto/servicio que intentas comprar no existe');

      $plan = Array2::find($itemJpa->planes, fn($x) => $x['duracion'] == $request->plan);

      if ($request->paymentType == 'suscripcion') {
        
      } else {
        $duracion = $plan['duracion'] ?? 1;
        $descuento = ($plan['descuento'] ?? 0) / 100;
        $precio = ($itemJpa->precio * $duracion) * (1 - $descuento);
        if ($itemJpa->percent_discount > 0) {
          $precio = Math::round($precio * (1 - ($itemJpa->percent_discount / 100)) * 100) / 100;
        }
        $config = [
          "amount" => round($precio * 100),
          "capture" => true,
          "currency_code" => "PEN",
          "description" => "Compra en " . env('APP_NAME'),
          "email" => $userJpa->email,
          "installments" => 0,
          "antifraud_details" => [
            "address" => 'Centro Empresarial Peruano - Suizo. Av. Aramburú 166',
            "address_city" => 'Miraflores',
            "country_code" => "PE",
            "first_name" => $userJpa->name,
            "last_name" => $userJpa->lastname ?? $userJpa->name,
            "phone_number" => $userJpa->phone ?? '997942949',
          ],
          "source_id" => $request->token
        ];

        $charge = $culqi->Charges->create($config);

        if (gettype($charge) == 'string') {
          $res = JSON::parse((string) $charge);
          throw new Exception($res['user_message']);
        }

        if (!isset($charge->id)) {
          throw new Exception('Ocurrio un error al procesar la transaccion');
        }
      }
    });

    return response($response->toArray(), $response->status);
  }
}
