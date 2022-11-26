<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TesgambarController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data-user',[PenggunaController::class,'index']);
Route::post('simpan-data-pengguna',[PenggunaController::class,'store']);
Route::delete('hapus-data-pengguna/{id}',[PenggunaController::class,'hapusPengguna']);
Route::put('ubah-data-pengguna/{id}',[PenggunaController::class,'ubahPengguna']);

Route::get('data-jenis',[JenisController::class,'index']);
Route::post('simpan-data-jenis',[JenisController::class,'store']);

Route::get('data-barang',[BarangController::class,'index']);
Route::post('simpan-barang',[BarangController::class,'simpanDataBrang']);
Route::delete('hapus-barang/{id}',[BarangController::class,'hapusBarang']);
Route::put('ubah-barang/{id}',[BarangController::class,'ubahDataBarang']);


Route::post('simpan-gambar',[TesgambarController::class,'store']);


Route::post('simpan-data-transaksi',[TransaksiController::class,'simpanDataTransaksi']);
Route::get('rekap-transaksi/{tglAwal}/{tglAkhir}',[TransaksiController::class,'rekap']);



Route::post('login-api',[PenggunaController::class,'login']);
