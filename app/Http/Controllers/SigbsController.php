<?php

namespace App\Http\Controllers;

use App\Models\Banksampah;

use App\Models\Sampah;
use Illuminate\Http\Request;

class SigbsController extends Controller
{
    public function index()
    {
        $bank = Banksampah::all();
        
        return view('sigbs.index', compact('bank',));
    }

    // public function banksampah()
    // {
    //     $bank = Banksampah::all();
    //     return view('sigbs.banksampah', compact('bank'));
    // }

    // public function pemetaan()
    // {
    //     $bank = Banksampah::all();
    //     return view('sigbs.pemetaan',compact('bank'));
    // }

    public function dataBS($id)
    {
        $bank = Banksampah::find($id);
        $sampah = Sampah::where('banksampahs_id', $id)->get();
        return view('sigbs.detail_bs', compact('bank','sampah'));
    }
    
}
