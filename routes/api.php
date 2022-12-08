<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KonserController;


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

//No_Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('konser', KonserController::class)->except('update','destroy','store');
Route::get('konserid/{id}', [KonserController::class, 'lihat']);

//test


//Auth
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('konser', KonserController::class)->except('show','index','show_id');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('buy', BuyController::class);
    Route::get('/pesanan', [AdminController::class, 'show']);
    Route::get('/pesanan-artist/{artist}', [AdminController::class, 'byartist']);  
    Route::post('/pesanan-send',[AdminController::class,'send']);
    Route::post('bayar',[BuyController::class,'bayar']);
   
    

});

