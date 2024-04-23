<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    //
    public function list(): JsonResponse
    {
        $currency_list = Currency::all();
        return response()->json($currency_list);
    }
}
