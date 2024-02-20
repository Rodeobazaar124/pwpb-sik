<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('actionregister', [LoginController::class, 'actionregister'])->name('actionregister');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('home', [TransaksiController::class,'index'])->name('home')->middleware('auth');
Route::resource('transaksi', TransaksiController::class);
Route::resource('barang', BarangController::class);
Route::get('actionlogout', [LoginController::class,'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('transaksi/nota/{transaksi:id_transaksi}', [TransaksiController::class,'nota_transaksi'])->name('transaksi.nota')->middleware('auth');
Route::get('cart', function(){
    return view('layout');
})->name('cart')->middleware('auth');
