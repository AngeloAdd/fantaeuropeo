<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teamscontroller;
use App\Http\Controllers\Betcontroller;


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


Auth::routes();
Route::get('/',[HomeController::class, 'index']);

Route::get('/squadre', [TeamsController::class, 'index']);

/* Bet CRUD */
Route::get('/pronostico',[BetController::class, 'create'])->name('bet.create');

