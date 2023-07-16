<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Banksampah;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BankSampahRequest;
use App\Models\Sampah;


class BanksampahController extends Controller
{
    public function dashboard()
    {
        $bank = Banksampah::all();
        $count = Banksampah::count();
        $count2 = Sampah::count();

        // $akhir = Banksampah::all()->last();
        return view('pemetaan.map', compact('bank','count','count2'));
    }

    public function indexBs()
    {
        $bank = Banksampah::all();
        return view('kelolabs.index_bs', compact('bank'));
    }

    public function formTambahBS()
    {

        return view('kelolabs.form_tambah_bs',);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function tambahbs(Request $request)
    {      
        try {
                $file = $request->file('foto');
                $filename = time() . '-' . $file->getClientOriginalName();
                $request->foto->move(public_path('storage'), $filename);

                // $imageName = Str::random(32).".".$request->foto->getClientOriginalExtension();

                //create bank
                Banksampah::create([
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'rute' => $request->rute,
                    'foto' => $filename,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                ]);
              
                //Json Response
                return redirect()->route('admin.banksampah')->with('message', 'Berhasil Menambahkan!');
            } catch (\Exception $e) {
                        return response()->json([
                            'message' => "something went really wrong"
                        ], 500);
                    }
    }

    public function formUbahBS($id)
    {
        $bank = Banksampah::find($id);
        return view('kelolabs.form_ubah_bs', compact('bank'));
    }

    public function ubahBS(Request $request, $id)
    {
        try{
            //menemukan banksampah
            $bank = Banksampah::find($id);
            if(!$bank){
                return response()->json([
                    'message' => 'Barang tidak ditemukan'
                ],404);
            }

            $bank->nama = $request->nama;
            $bank->alamat = $request->alamat;
            $bank->rute = $request->rute;
            $bank->latitude = $request->latitude;
            $bank->longitude = $request->longitude;

            if ($request->hasFile('foto')){             
                $file = $request->file('foto');
                $filename = time() . '-' . $file->getClientOriginalName();
                $request->foto->move(public_path('storage'), $filename);
                $bank->foto = $filename;

            //update barang
            $bank->update();

            //respon json
            }
            return redirect()->route('admin.banksampah.detail', ['id' => $bank->id])->with('message', 'Berhasil Mengupdate!');
        
        }catch(\Exception $e){
            return response()->json([
                'message' => "Something went really wrong"
            ]);
        } 
    }

    public function detailBS($id)
    {
        $bank = Banksampah::find($id);
        return view('kelolabs.detail_bs', compact('bank'));
    }



    public function titik()
    {
        $bank = Banksampah::all();
        return json_encode($bank);
    }

    public function popup($id = '')
    {
        $bank = Banksampah::all();
        return json_encode($bank);
    }

    public function hapusBS($id)
    {
        $bank = Banksampah::find($id);
        if (!$bank) {
            return response()->json([
                'message' => 'Bank Sampah tidak ditemukan'
            ], 404);
        }
        $url = Storage::disk('public');
        if ($url->exists($bank->foto));
        $bank->delete($bank->foto);
        $bank->delete();
        return redirect()->route('admin.banksampah')->with('message', 'Berhasil Menghapus!');;
    }

    public function detailUnit()
    {
        $bank = Banksampah::all();
        $count = Banksampah::count();
        return view('kelolabs.detail_unit', compact('bank','count'));
    }
}
