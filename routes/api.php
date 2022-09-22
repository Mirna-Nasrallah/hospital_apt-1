<?php

use App\Http\APIs\reservationApi;
use App\Http\APIs\userLoginApi;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/makeReservation',[reservationApi::class,'store']);
    Route::get('destroy.apt/{id}',[reservationApi::class,'destroy']);
    Route::post('update.apt/{id}',[reservationApi::class,'update']);

    });
Route::post('SignUp', [userLoginApi::class, 'Signup']);
Route::post('Login', [userLoginApi::class, 'doLogin']);
//FOR fogetting password
Route::post('reset', [resetController::class, 'forgotPassword']);
Route::post('reset-password', [resetController::class, 'reset']);
