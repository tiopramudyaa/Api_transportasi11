<?php

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
Route::get('/all',[StasiunController::class,'index']);
Route::post('/resetPassword',[UserController::class,'resetPassword']);
Route::apiResource('tiket', TiketController::class);
