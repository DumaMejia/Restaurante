<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;


class PagoController extends Controller
{
    public function procesarPago(Request $request)
    {
        // Configurar el ambiente de PayPal
        $clientId = config('services.paypal.client_id');
        $clientSecret = config('services.paypal.client_secret');

        $environment = new PayPalEnvironment($clientId, $clientSecret);
        $client = new PayPalHttpClient($environment);

        // Crear una orden de PayPal
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => '10.00', // Precio total
                    ],
                ],
            ],
        ];

        try {
            $response = $client->execute($request);

            // Redirigir al usuario a PayPal para completar el pago
            return redirect($response->result->links[1]->href);
        } catch (HttpException $e) {
            // Manejar errores
            return back()->withErrors(['error' => 'No se pudo procesar el pago']);
        }
    }
}
