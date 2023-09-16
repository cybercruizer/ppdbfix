<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PendaftarController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Bendahara\PembayaranController;

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
    return view('form');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/pendaftar/store', [FormController::class,'store'])->name('form.store');
Route::prefix('admin')->group(function() {
    Route::get('/',[HomeController::class, 'index'])->name('home');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('pendaftar', [PendaftarController::class,'index'])->name('pendaftar');
    Route::get('pendaftar/cari',[PendaftarController::class,'cari'])->name('caripendaftar');
    Route::get('pendaftar/hapus/{id}',[PendaftarController::class,'destroy'])->name('hapuspendaftar');
    Route::get('pendaftar/edit/{id}',[PendaftarController::class,'edit'])->name('editpendaftar');
    Route::get('pendaftar/list/{jurusan}', [PendaftarController::class,'perjurusan'])->name('perjurusan');
    Route::get('pendaftar/export/excel',[PendaftarController::class,'exportExcel'])->name('pendaftar.exportExcel');
    Route::put('pendaftar/update/{id}', [PendaftarController::class,'update'])->name('pendaftar.update');
});
Route::group(['middleware' => 'bendahara.access'], function () {
    Route::get('/pembayaran', [PembayaranController::class,'index'])->name('pembayaran.index');
    Route::get('/pembayaran/create', [PembayaranController::class,'create'])->name('pembayaran.create');
    Route::get('/pembayaran/history', [PembayaranController::class,'history'])->name('pembayaran.history');
    Route::post('/pembayaran', [PembayaranController::class,'store'])->name('pembayaran.store');

});
