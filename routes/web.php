<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MainController;
use App\Models\Client;
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


Route::get('/',                         [MainController::class, 'index'])->name('home');

Route::get('/dashboard',                [MainController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/clients',                  [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create',           [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients',                 [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}',         [ClientController::class, 'edit'])->name('clients.edit');
Route::post('/clients/{client}',        [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}',      [ClientController::class, 'destroy'])->name('clients.delete');


require __DIR__ . '/auth.php';
