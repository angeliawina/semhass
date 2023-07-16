<?php

namespace App\Http\Controllers;

use App\Models\Banksampah;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function map()
    {
        $bank = Banksampah::all();
        return view('pemetaan.map', compact('bank'));
    }
}
