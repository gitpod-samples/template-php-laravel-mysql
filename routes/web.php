<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'welcome']);

Route::get('login', [HomeController::class, 'login']);

Route::get('calculator', [HomeController::class, 'calculator']);

Route::get('policy', [HomeController::class, 'policy']);

Route::get('security', [HomeController::class, 'security']);

Route::get('terms', [HomeController::class, 'terms']);

Route::get('confirm', [HomeController::class, 'confirm']);

