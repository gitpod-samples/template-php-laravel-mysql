<?php

use Illuminate\Support\Facades\Route;
use App\Models\Piloto;
use App\Models\Vuelo;
use App\Models\Pasaje;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\PilotoController;


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
    return view('welcome');
});

Route::resource('/vuelos', VueloController::class);
Route::resource('/pilotos', PilotoController::class);
Route::resource('/pasajes', PasajeController::class);

Route::delete('/vuelos/{id}', 'VueloController@destroy')->name('vuelos.destroy');



Route::get('/pilotos.restore', [PilotoController::class,'restore'])->name('pilotos.restore');
Route::get('/pilotos.onlyTrashed', [PilotoController::class,'onlyTrashed'])->name('pilotos.onlyTrashed');

Route::get('/vuelos.restore', [VueloController::class,'restore'])->name('vuelos.restore');
Route::get('/vuelos.onlyTrashed', [VueloController::class,'onlyTrashed'])->name('vuelos.onlyTrashed');


