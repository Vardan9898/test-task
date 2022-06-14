<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $binance = new \sabramooz\binance\BinanceAPI();

        return view('dashboard', [
            'binance' => $binance
        ]);
    }
}
