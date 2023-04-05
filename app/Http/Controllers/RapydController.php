<?php

namespace App\Http\Controllers;

use App\services\rapyd\RapydGateway;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class RapydController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function index()
    {
        $test = new RapydGateway();
        $data = [
            "amount" => 1050,
            "currency" => "USD",
            "payment_method" => [
                "type" => "us_visa_card",
                "fields" => [
                    "number" => "4111111111111111",
                    "expiration_month" => "12",
                    "expiration_year" => "25",
                    "cvv" => "789",
                    "name" => "John Doe"
                ]
            ],
            "capture" => true
        ];
        $result = $test->createPayment($data);
        dd($result);
    }
}
