<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Banksampah;
use App\Models\Sampah;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    public function indexSampah()
    {
        $bank = Banksampah::all();
        
        return view('kelolasampah.index_sampah', compact('bank'));
    }

    public function dataSampah($id)
    {
        $bank = Banksampah::find($id);
        $sampah = Sampah::where('banksampahs_id', $id)->get();
        return view('kelolasampah.data_sampah', compact('bank', 'sampah'));
    }

    public function FormTambahSampah($id)
    {
        $bank = Banksampah::find($id);
        return view('kelolasampah.form_tambah_sampah', compact('bank'));
    }

     /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function tambahSampah(Request $request)
    {
        try {
                $sampah = Banksampah::findOrFail($request->id);
                $file = $request->file('foto');
                $filename = time() . '-' . $file->getClientOriginalName();
                $request->foto->move(public_path('storage'), $filename);

                //create sampah
                $sampah = new Sampah();
                $sampah->banksampahs_id = $request->id;
                $sampah->nama = $request->nama;
                $sampah->harga = $request->harga;
                $sampah->foto = $filename;

                $sampah->save();
              
            //Json Response
            return redirect()->route( 'admin.kelolasampah.datasampah', ['id' => $request->id])->with('message','Berhasil Menambahkan!') ;
            } catch (\Exception $e) {
                        return response()->json([
                            'message' => "something went really wrong"
                        ], 500);
                    }
    }

    public function formUbahSampah($banksampah_id, $id)
    {
        $bank = Banksampah::where('id', $banksampah_id)->first();
        $sampah = $bank->sampahs()->where('id', $id)->first();
        return view('kelolasampah.form_ubah_sampah', compact('bank', 'sampah'));
    }

    public function ubahSampah(Request $request, $banksampah_id, $id)
    {
        try{
            //menemukan banksampah
            $bank = Banksampah::where('id', $banksampah_id)->first();
            $sampah = $bank->sampahs()->where('id', $id)->first();
            if(!$sampah){
                return response()->json([
                    'message' => 'Data tidak ditemukan'
                ],404);
        }
            $sampah->banksampahs_id = $request->banksampahs_id;
            $sampah->nama = $request->nama;
            $sampah->harga = $request->harga;

            if ($request->hasFile('foto')){
                $file = $request->file('foto');
                $filename = time() . '-' . $file->getClientOriginalName();
                $request->foto->move(public_path('storage'), $filename);
                $sampah->foto = $filename;

            //update bank
            $sampah->update();            
        }
        //respon json
            return redirect()->route('admin.kelolasampah.detail',['banksampah_id'=>$sampah->banksampahs_id, 'id'=>$sampah->id])->with('message','Berhasil Mengupdate!');        
            }catch(\Exception $e){
                return response()->json([
                    'message' => "Something went really wrong"
            ]);
        } 
}

    public function detailSampah($banksampah_id, $id)
    {
        $bank = Banksampah::where('id', $banksampah_id)->first();
        $sampah = $bank->sampahs()->where('id', $id)->first();
        return view('kelolasampah.detail_sampah',compact('bank','sampah'));
    }  

    public function hapusSampah($banksampah_id,$id)
    {
        $bank = Banksampah::where('id', $banksampah_id)->first();
        // $sampah = $bank->sampahs()->where('id', $id)->first();

        $sampah = Sampah::find($id);
        if (!$sampah) {
            return response()->json([
                'message' => 'Sampah tidak ditemukan'
            ], 404);
        }
        $url = Storage::disk('public');
        if ($url->exists($sampah->foto));
        $sampah->delete($sampah->foto);
        $sampah->delete();
        return redirect()->route('admin.kelolasampah.datasampah',['id' => $bank->id])->with('message', 'Berhasil Menghapus!');;
    }

    public function jumlahSampah()
    {
        $bank = Banksampah::all();
        $sampah = Sampah::all();
        return view('kelolasampah.jumlah_sampah', compact('bank','sampah'));
    }
            
}
    
