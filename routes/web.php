<?php

use App\Http\Controllers\LatihanControllers;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Auth;



use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//PRODUK
//index
Route::get('tampil-produk', [ProdukController::class, 'index']);
//create produk
Route::get('tambah-produk', [ProdukController::class, 'create'])->name('produk.create');
//simpan produk
Route::post('tampil-produk', [ProdukController::class, 'store'])->name('produk.store');
//edit produk
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
//update produk
Route::post('/produk/edit/{id}', [ProdukController::class, 'update'])->name('produk.update');
//delete produk
Route::post('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

Route::get('/transaksi', function () {
    return view('transaksi');
});

Auth::routes();

//login register
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth'])->name('dashboard');


//aksi produk dengan middleware
Route::middleware(['auth'])->group(function () {

    //index
    Route::get('tampil-produk', [ProdukController::class, 'index']);
    //create produk
    Route::get('tambah-produk', [ProdukController::class, 'create'])->name('produk.create');
    //simpan produk
    Route::post('tampil-produk', [ProdukController::class, 'store'])->name('produk.store');
    //edit produk
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    //update produk
    Route::post('/produk/edit/{id}', [ProdukController::class, 'update'])->name('produk.update');
    //delete produk
    Route::post('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    //laporan
    Route::get('/laporanmaster', function () { return view('laporanmaster'); });
    //transaksi
    Route::get('/transaksimaster', function () { return view('transaksimaster'); });
    
});

//routing excel
Route::get('excelProduk', [ProdukController::class, 'exportExcelProduk'])->name('excel');

//routing pdf
Route::get('cetakPDFProduk', [ProdukController::class, 'pdfProduk'])->name('pdfProduk');

//routing chart
Route::get('laporan', [ProdukController::class, 'chart']);
