<?php

use App\Http\Controllers\ClientApiController;
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

Route::get('/info',                             [ClientApiController::class, 'index']);

Route::group(['prefix' => 'client', 'middleware' => 'check.token'], function () {
    Route::post('/info',                       [ClientApiController::class, 'info']);
    Route::post('/login',                      [ClientApiController::class, 'login']);
});