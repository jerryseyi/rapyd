<?php

namespace App\Http\Controllers;

use App\services\rapyd\RapydGateway;
use Illuminate\Http\Request;

class RapydController extends Controller
{
    public function index()
    {
        $test = new RapydGateway();

        dd($test);
    }
}
