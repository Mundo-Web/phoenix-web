<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cupon;
use App\Models\Membership;
use App\Models\Offer;
use App\Models\Payment;
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
use SoDe\Extend\Crypto;
use SoDe\Extend\Fetch;
use SoDe\Extend\JSON;
use SoDe\Extend\Math;
use SoDe\Extend\Response;
use SoDe\Extend\Text;
use Illuminate\Support\Str;

class PaymentController extends BasicController
{

  public $model = Payment::class;
  private $culqi = null;
  private $url = null;

  public function __construct()
  {
    $this->culqi = new Culqi(['api_key' => env('CQ_PRIVATE_KEY')]);
    $this->url = env('CULQI_API');
  }

  public function index()
  {
    return view('pages.paymentHistory.index');
  }

  public function culqi(Request $request)
  {
    $response = Response::simpleTryCatch(function () use ($request) {

      $userJpa = User::find(Auth::user()->id);

      $itemJpa = Products::find($request->productId);
      if (!$itemJpa) throw new Exception('El producto/servicio que intentas comprar no existe');

      $plan = Array2::find($itemJpa->planes, fn($x) => $x['duracion'] == $request->plan);
      if (!$plan) throw new Exception('El plan que intentas comprar no existe');

      if ($request->paymentType == 'suscripcion') {
        $duracion = $plan['duracion'] ?? 1;
        $descuento = ($plan['descuento'] ?? 0) / 100;
        $precio = ($itemJpa->precio * $duracion) * (1 - $descuento);
        if ($itemJpa->percent_discount > 0) {
          $precio = Math::round($precio * (1 - ($itemJpa->percent_discount / 100)) * 100) / 100;
        }

        $cuponDiscount = 0;
        $cupon = null;
        if ($request->cupon) {
          $cupon = Cupon::query()
            ->where('codigo', $request->cupon)
            ->where('fecha_caducidad', '>=', date('Y-m-d'))
            ->where('visible', true)
            ->where('status', true)
            ->first();

          if ($cupon) {
            if ($cupon->porcentaje) {
              $cuponDiscount = $precio * ($cupon->monto / 100);
            } else {
              $cuponDiscount = $cupon->monto;
            }
            $precio -= $cuponDiscount;
          }
        }

        $membershipsId = [];
        $startDate = date('Y-m-d');
        $precioxmembership = $precio / $duracion;
        $cuponDiscountxmembership = $cuponDiscount / $duracion;
        for ($i = 0; $i < $duracion; $i++) {
          $membershipJpa = Membership::create([
            'start_date' => $startDate,
            'email' => $userJpa->email,
            'item' => $itemJpa->producto,
            'amount' => $precioxmembership,
            'cupon' => $cupon?->codigo,
            'cupon_discount' => $cuponDiscountxmembership,
          ]);
          $startDate = date('Y-m-d', strtotime($startDate . ' +1 month'));
          $membershipsId[] = $membershipJpa->id;
        }

        $cq_cus_id = $this->createClient($userJpa);
        $cq_crd_id = $this->createCard($cq_cus_id, $request->token);
        $cq_pln_id = $this->createPlan($plan, $userJpa, $precio);
        $cq_sxn_id = $this->subscribe($cq_crd_id, $cq_pln_id);

        // CulqiSubscription::create([
        //   'renewal_id' => $sale->renewal_id,
        //   'user_id' => Auth::user()->id,
        //   'cq_crd_id' => $cq_crd_id,
        //   'cq_pln_id' => $cq_pln_id,
        //   'cq_sxn_id' => $cq_sxn_id,
        //   'sale_id' => $sale->id,
        //   'already_paid' => false,
        //   'current_payment' => 0,
        //   'total_payments' => $sale->renewal->months,
        // ]);
      } else {
        $this->oneTimePayment($request, $itemJpa, $userJpa, $plan);
      }
    });

    return response($response->toArray(), $response->status);
  }

  private function oneTimePayment(Request $request, Products $itemJpa, User $userJpa, $plan)
  {
    $duracion = $plan['duracion'] ?? 1;
    $descuento = ($plan['descuento'] ?? 0) / 100;
    $precio = ($itemJpa->precio * $duracion) * (1 - $descuento);
    if ($itemJpa->percent_discount > 0) {
      $precio = Math::round($precio * (1 - ($itemJpa->percent_discount / 100)) * 100) / 100;
    }

    $cuponDiscount = 0;
    $cupon = null;
    if ($request->cupon) {
      $cupon = Cupon::query()
        ->where('codigo', $request->cupon)
        ->where('fecha_caducidad', '>=', date('Y-m-d'))
        ->where('visible', true)
        ->where('status', true)
        ->first();

      if ($cupon) {
        if ($cupon->porcentaje) {
          $cuponDiscount = $precio * ($cupon->monto / 100);
        } else {
          $cuponDiscount = $cupon->monto;
        }
        $precio -= $cuponDiscount;
      }
    }

    $membershipsId = [];
    $startDate = date('Y-m-d');
    $precioxmembership = $precio / $duracion;
    $cuponDiscountxmembership = $cuponDiscount / $duracion;
    for ($i = 0; $i < $duracion; $i++) {
      $membershipJpa = Membership::create([
        'start_date' => $startDate,
        'email' => $userJpa->email,
        'item' => $itemJpa->producto,
        'amount' => $precioxmembership,
        'cupon' => $cupon?->codigo,
        'cupon_discount' => $cuponDiscountxmembership,
      ]);
      $startDate = date('Y-m-d', strtotime($startDate . ' +1 month'));
      $membershipsId[] = $membershipJpa->id;
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

    $charge = $this->culqi->Charges->create($config);

    // $charge = json_decode(json_encode([
    //   "object" => "charge",
    //   "id" => "chr_test_1234567890abcdef",
    //   "amount" => round($precio * 100),
    //   "amount_refunded" => 0,
    //   "current_amount" => round($precio * 100),
    //   "currency_code" => "PEN",
    //   "description" => "Pago de membresía mensual",
    //   "email" => "cliente@correo.com",
    //   "metadata" => [
    //     "cliente_id" => "123",
    //     "gimnasio" => "Gym Elite"
    //   ],
    //   "installments" => 0,
    //   "antifraud_details" => [
    //     "first_name" => "Juan",
    //     "last_name" => "Pérez",
    //     "address" => "Av. Siempre Viva 123",
    //     "address_city" => "Lima",
    //     "country_code" => "PE",
    //     "phone_number" => "999999999",
    //     "object" => "antifraud_details"
    //   ],
    //   "source" => [
    //     "id" => "tkn_test_abcd1234",
    //     "object" => "card",
    //     "brand" => "Visa",
    //     "last_four" => "4242",
    //     "iin" => "411111",
    //     "type" => "debit",
    //     "category" => "personal",
    //     "issuer" => "BANCO DE PRUEBA",
    //     "country_code" => "PE",
    //     "email" => "cliente@correo.com"
    //   ],
    //   "outcome" => [
    //     "type" => "venta_exitosa",
    //     "user_message" => "Pago realizado correctamente",
    //     "merchant_message" => "La transacción fue completada con éxito"
    //   ],
    //   "fraud_score" => 10,
    //   "paid" => true,
    //   "statement_descriptor" => "GYM ELITE",
    //   "creation_date" => 1717285200
    // ]));

    if (gettype($charge) == 'string') {
      $res = JSON::parse((string) $charge);
      throw new Exception($res['user_message']);
    }

    $paymentJpa = Payment::create([
      'cargo_id' => $charge->id,
      'item_id' => $itemJpa->id,
      'item' => $itemJpa->producto,
      'payment_type' => $request->paymentType,
      'amount' => $charge->amount / 100,
      'cupon' => $cupon?->codigo,
      'cupon_discount' => $cuponDiscount,
      'data' => $charge,
      'email' => $userJpa->email,
    ]);

    Membership::whereIn('id', $membershipsId)->update([
      'payment_id' => $paymentJpa->id,
    ]);

    if (!isset($charge->id)) {
      throw new Exception('Ocurrio un error al procesar la transaccion');
    }
  }

  private function createClient(User $userJpa): string
  {
    $user = Auth::user();

    $resGet = new Fetch($this->url . '/customers?email=' . $userJpa->email, [
      'headers' => ['Authorization' => 'Bearer ' . \env('CQ_PRIVATE_KEY')]
    ]);

    if (!$resGet->ok) throw new Exception('Ocurrio un error al consultar clientes en Culqi');

    $dataGet = $resGet->json();

    if (count($dataGet['data']) > 0) {
      $cq_cus_id = $dataGet['data'][0]['id'];
      User::where('id', $user->id)->update(['cq_cus_id' => $cq_cus_id]);
      return $cq_cus_id;
    }

    $res = new Fetch($this->url . '/customers', [
      'method' => 'POST',
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . \env('CQ_PRIVATE_KEY')
      ],
      'body' => [
        "first_name" => $user->name,
        "last_name" => $user->lastname ?? $user->name,
        "email" => $user->email,
        "address" => ($user->address) ? $user->address . ' ' . $user->address_number : 'Centro Empresarial Peruano - Suizo. Av. Aramburú 166',
        "address_city" => $user->district ?? $user->province ?? 'Miraflores',
        "country_code" => "PE",
        "phone_number" => $user->phone ?? '997942949',
      ]
    ]);

    if (!$res->ok) throw new Exception('Ocurrio un error al crear el cliente en Culqi');
    $data = $res->json();
    User::where('id', $user->id)
      ->update(['cq_cus_id' => $data['id']]);
    return $data['id'];
  }

  private function createCard($cq_cus_id, $token): string
  {
    $res = new Fetch($this->url . '/cards', [
      'method' => 'POST',
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . \env('CQ_PRIVATE_KEY')
      ],
      'body' => [
        "customer_id" => $cq_cus_id,
        "token_id" => $token,
        "validate" => true,
        "metadata" => [
          "marca_tarjeta" => "VISA"
        ]
      ]
    ]);
    if (!$res->ok) throw new Exception('Ocurrio un error al crear la tarjeta en Culqi');
    $data = $res->json();
    return $data['id'];
  }

  private function createPlan($plan, User $userJpa, float $amount)
  {
    $name = Text::keep($plan['duracion']
      . ' - ' . explode(' ', $userJpa->name)[0]
      . ' ' . explode(' ', $userJpa->lastname ?? $userJpa->name)[0]
      . ' ' . Crypto::short(), 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789- ');

    $amount = $amount / $plan['duracion'];

    $body = [
      "name" => $name,
      "short_name" => Str::slug($name),
      "description" => 'Plan ' . $name,
      "amount" => Math::ceil($amount * 100),
      "currency" => "PEN",
      "interval_unit_time" => 3,
      "interval_count" => 0
    ];

    $body["initial_cycles"] = [
      "count" => 0, // Solo primer mes
      "has_initial_charge" => false,
      "amount" => 0,
      "interval_unit_time" => 3
    ];

    $res = new Fetch($this->url . '/recurrent/plans/create', [
      'method' => 'POST',
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . \env('CQ_PRIVATE_KEY')
      ],
      'body' => $body
    ]);

    if (!$res->ok) throw new Exception('Ocurrio un error al crear el plan en Culqi');

    $data = $res->json();

    return $data['id'];
  }

  private function subscribe($cq_crd_id, $cq_pln_id)
  {
    $res = new Fetch($this->url . '/recurrent/subscriptions/create', [
      'method' => 'POST',
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . \env('CQ_PRIVATE_KEY')
      ],
      'body' => [
        "card_id" => $cq_crd_id,
        "plan_id" => $cq_pln_id,
        "tyc" => true,
        "metadata" => [
          'user_id' => Auth::user()->id
        ]
      ]
    ]);

    if (!$res->ok) throw new Exception('Ocurrio un error al crear la subscripcion');
    $data = $res->json();
    return $data['id'];
  }
}
