<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Banksampah;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BankSampahRequest;


class BanksampahController extends Controller
{
    public function dashboard()
    {
        $bank = Banksampah::all();

        // $akhir = Banksampah::all()->last();
        return view('pemetaan.map', compact('bank',));
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

    public function tambahBS(Request $request)
    {
        try {
            $imageName = Str::random(32) . "." . $request->foto->getClientOriginalExtension();


            //buat bank sampah
            Banksampah::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'rute' => $request->rute,
                'foto' => $imageName,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,

            ]);

            //folder foto
            Storage::disk('public')->put($imageName, file_get_contents($request->foto));
            $url = Storage::url("/storage/app/{$imageName}");
            $path = public_path($url);
            return redirect()->route('admin.banksampah')->with('message', 'Berhasil Menambahkan!');

            //respon
            return response()->json([
                'message' => "Berhasil Menambahkan",
                'foto' => $path
            ], 200);

            //respon gagal
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
        try {
            $bank = Banksampah::find($id);
            if (!$bank) {
                return response()->json([
                    'message' => 'Data tidak ditemukan'
                ], 404);
            }

            $bank->nama = $request->nama;
            $bank->alamat = $request->alamat;
            $bank->rute = $request->rute;
            $bank->latitude = $request->latitude;
            $bank->longitude = $request->longitude;

            if ($request->foto) {
                $storage = Storage::disk('public');

                //hapus foto lama
                if ($storage->exists($bank->foto))
                    $storage->delete($bank->foto);

                //nama foto
                $imageName = Str::random(32) . "." . $request->foto->getClientOriginalExtension();
                $bank->foto = $imageName;

                //save foto
                $storage->put($imageName, file_get_contents($request->foto));
            }

            //update foto
            $bank->save();

            //respon
            return redirect()->route('admin.banksampah.detail', ['id' => $bank->id])->with('message', 'Berhasil Mengupdate!');
        } catch (\Exception $e) {
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
        return view('kelolabs.detail_unit', compact('bank'));
    }
}
