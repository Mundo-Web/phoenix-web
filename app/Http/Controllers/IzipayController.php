<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use SoDe\Extend\Crypto;
use SoDe\Extend\Fetch;
use SoDe\Extend\Response;

class IzipayController extends Controller
{
    public static function token(Sale $sale)
    {   
    
        $clientId = env('IZIPAY_CLIENT_ID');
        $clientSecret = env('IZIPAY_CLIENT_SECRET');
        $auth = base64_encode($clientId . ':' . $clientSecret);

        $url = env('IZIPAY_URL');

        $totalAmount = $sale->total + $sale->address_price;
       
        $res = new Fetch($url, [
            'method' => 'POST',
            'headers' => [
                'Authorization' => 'Basic ' . $auth,
                'Content-Type' => 'application/json',
            ],
            'body' => [
                'amount' => $totalAmount * 100,
                'currency' => 'PEN',
                'orderId' => $sale->code,
                'customer' => [
                    'email' => $sale->email,
                ],
            ]
        ]);

        $data = $res->json();
       
        return $data['answer']['formToken'];
    }
}
