<?php

use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\KeretaController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\StasiunController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\TiketController;
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

Route::apiResource('tiket', TiketController::class);

Route::apiResource('kereta', KeretaController::class);

Route::get('/jadwal',[JadwalController::class,'index']);
Route::get('/showJadwal/{tanggal}&{berangkat}&{tiba}&{stasiun}',[JadwalController::class, 'show']);

Route::apiResource('review', ReviewController::class);
Route::get('/reviewByKereta/{kode}',[ReviewController::class,'index']);

