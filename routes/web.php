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
Route::get('/pronostico/prossimo/incontro',[BetController::class, 'nextGame'])->name('bet.nextGame');
Route::get('/pronostico/incontro/{game}',[BetController::class, 'create'])->name('bet.create');
Route::get('/errore/incontro/{game?}', [Betcontroller::class, 'gameError'])->name('errore.fase');

Route::get('/pronostico/incontro/{game}/validazione/tempo',[BetController::class, 'timeValidation'])->name('bet.time_validation');

Route::post('/pronostico/incontro/{game}', [BetController::class, 'store'])->name('bet.store');
