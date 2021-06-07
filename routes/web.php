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

/* homepage */
Route::get('/',[HomeController::class, 'index'])->name('/');

/* gestione schermata prossimo incontro */
Route::get('/pronostico/prossimo/incontro',[BetController::class, 'nextGame'])->name('bet.nextGame');

/* Bet CRUD */
Route::get('/pronostico/incontro/{game}',[BetController::class, 'create'])->name('bet.create');
Route::post('/pronostico/incontro/{game}', [BetController::class, 'store'])->name('bet.store');
Route::get('/pronostico/modifica/{bet}',[BetController::class, 'edit'])->name('bet.edit');
Route::put('/pronostico/aggiorna/{bet}',[BetController::class, 'update'])->name('bet.update');

/* CRUD per vincitore e capocannoniere */
Route::get('/pronostico/vincitore',[BetController::class, 'createWinner'])->name('bet.winner');

/* Errori */
// l'incontro non è disponibile perchè ancora non deciso
Route::get('/errore/incontro/{game?}', [Betcontroller::class, 'gameError'])->name('errore.fase');
// L'incontro è oscurato perchè troppo lontano
Route::get('/pronostico/incontro/{game}/validazione/tempo',[BetController::class, 'timeValidation'])->name('bet.time_validation');

