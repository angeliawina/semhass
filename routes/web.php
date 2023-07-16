<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BanksampahController;
use App\Http\Controllers\SigbsController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\SampahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [BanksampahController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('admin.dashboard');
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
   //DATA BANK SAMPAH
    Route::get('/', [BanksampahController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/kelolabs/index', [BanksampahController::class, 'indexBs'])->name('admin.banksampah');
    Route::get('/kelolabs/formtambah', [BanksampahController::class, 'formTambahBS'])->name('admin.banksampah.formtambah');
    Route::get('/kelolabs/formubah/{id}', [BanksampahController::class, 'formUbahBS'])->name('admin.banksampah.formubah');
    Route::post('/kelolabs/tambah', [BanksampahController::class, 'tambahBS'])->name('admin.banksampah.tambah');
    Route::post('/kelolabs/ubah/{id}', [BanksampahController::class, 'ubahBS'])->name('admin.banksampah.ubah');
    Route::get('/kelolabs/detail/{id}', [BanksampahController::class, 'detailBS'])->name('admin.banksampah.detail');
    Route::get('/kelolabs/hapus/{id}', [BanksampahController::class, 'hapusBS'])->name('admin.banksampah.hapus');
    Route::get('/kelolabs/titik', [BanksampahController::class, 'titik'])->name('admin.banksampah.titik');
    Route::get('/kelolabs/popup/{id}', [BanksampahController::class, 'popup'])->name('admin.banksampah.popup');
    Route::get('/kelolabs/unit', [BanksampahController::class, 'detailUnit'])->name('admin.banksampah.unit');
    

    //DATA SAMPAH
    Route::get('/kelolasampah/index', [SampahController::class, 'indexSampah'])->name('admin.datasampah');
    Route::get('/kelolasampah/datasampah/{id}', [SampahController::class, 'dataSampah'])->name('admin.kelolasampah.datasampah');
    Route::get('/kelolasampah/formtambah/{id}', [SampahController::class, 'formTambahSampah'])->name('admin.kelolasampah.formtambah');
    Route::post('/kelolasampah/tambah', [SampahController::class, 'tambahSampah'])->name('admin.kelolasampah.tambah');
    Route::get('/kelolasampah/formubah/{banksampah_id}/sampah/{id}', [SampahController::class, 'formUbahSampah'])->name('admin.kelolasampah.formubah');
    Route::get('/kelolasampah/detail/{banksampah_id}/sampah/{id}', [SampahController::class, 'detailSampah'])->name('admin.kelolasampah.detail');
    Route::post('/kelolasampah/ubah/{banksampah_id}/sampah/{id}', [SampahController::class, 'ubahSampah'])->name('admin.kelolasampah.ubah');
    Route::get('/kelolasampah/hapus/{banksampah_id}/sampah/{id}', [SampahController::class, 'hapusSampah'])->name('admin.kelolasampah.hapus');
    Route::get('/kelolasampah/jumlah', [SampahController::class, 'jumlahSampah'])->name('admin.kelolasampah.jumlah');

});

require __DIR__.'/auth.php';

 

    

   
    //PETA
    Route::get('/pemetaan/map', [PetaController::class, 'map'])->name('admin.map');


    //SIGBS
    Route::get('/sigbs/dashboard', [SigbsController::class, 'index'])->name('sigbs.index');
    // Route::get('/sigbs/bs', [SigbsController::class, 'banksampah'])->name('sigbs.bs');
    // Route::get('/sigbs/map', [SigbsController::class, 'pemetaan'])->name('sigbs.pemetaan');
    Route::get('/sigbs/banksampah/{id}', [SigbsController::class, 'dataBS'])->name('sigbs.dataBS');
    


