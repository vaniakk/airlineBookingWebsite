<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
        public function show()
        {
            $flight = Flight::all();
            return view('flights', ['flights' => $flight]);
        }
}
