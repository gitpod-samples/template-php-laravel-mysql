<?php

use App\Http\Controllers\PasajeController;
use App\Http\Controllers\Pasaje;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\PilotoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/vuelos', VueloController::class);

Route::resource('/pilotos', PilotoController::class);

Route::resource('/pasajes', PasajeController::class);

Route::get('/vuelos_piloto/{piloto_id}', [PilotoController::class, 'vuelosPiloto'])->name('vuelos_piloto');

Route::get('/pasaje_mas/{pasaje_id}', [PasajeController::class, 'masPasaje'])->name('mas_pasaje'); 

Route::get('/pasaje_menos/{pasaje_id}', [PasajeController::class, 'menosPasaje'])->name('menos_pasaje');

Route::get('/imprimirpdf', [PilotoController::class, 'imprimir']);