<?php

use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\KeretaController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\StasiunController;
use App\Http\Controllers\Api\SouvenirController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\TiketController;
use App\Http\Controllers\Api\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('User',UserController::class);
Route::post('/login',[UserController::class,'authenticate']);
Route::post('/resetPassword',[UserController::class,'resetPassword']);

Route::get('/all',[StasiunController::class,'index']);

Route::get('/allSouve',[SouvenirController::class,'index']);
Route::apiResource('souvenir',SouvenirController::class);

Route::apiResource('transaksi',TransaksiController::class);
Route::get('transaksiUser/{id}',[TransaksiController::class,'showByUser']);

Route::apiResource('tiket', TiketController::class);
Route::get('tiketShow/{id}',[TiketController::class,'showByUser']);

Route::apiResource('/kereta', KeretaController::class);

Route::get('/jadwal',[JadwalController::class,'index']);

Route::get('/showJadwal/{berangkat}/{tiba}/{tanggal}',[JadwalController::class, 'show']);

Route::get('/jadwal/{id}',[JadwalController::class,'showById']);


Route::apiResource('review', ReviewController::class);
Route::get('/reviewByKereta/{kode}',[ReviewController::class,'index']);
Route::get('/reviewUser/{kode}/{id}',[ReviewController::class,'FindByKeretaUser']);
