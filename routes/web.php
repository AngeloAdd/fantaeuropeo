<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BetController;
use App\Http\Controllers\UserController;


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

/* redirect loggato */
Route::get('/loggedin', function() {
    return view('loggedin');
})->name('loggedin');

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
Route::get('/errore/incontro/{game?}', [BetController::class, 'gameError'])->name('errore.fase');
// L'incontro è oscurato perchè troppo lontano
Route::get('/pronostico/incontro/{game}/validazione/tempo',[BetController::class, 'timeValidation'])->name('bet.time_validation');

/* routes per password */

Route::get('profilo/utente/reset', [UserController::class, 'resetPassword'])->name('password.reset');
Route::put('password/store', [UserController::class, 'storePassword'])->name('password.store');

/* rotte per moderatori */

Route::get('pannello/controllo', [UserController::class, 'modIndex'])->name('mod.index');
Route::get('pannello/controllo/crea/utente', [UserController::class, 'modUserCreate'])->name('mod.userCreate');
Route::post('pannello/controllo/nuovo/utente/creato', [UserController::class, 'modUserStore'])->name('mod.userStore');
Route::delete('pannello/controllo/cancella/{user}', [UserController::class, 'modUserDelete'])->name('mod.userDelete');
Route::get('pannello/controllo/utenti', [UserController::class, 'modUsers'])->name('mod.users');
Route::get('pannello/controllo/utenti/{user}', [UserController::class, 'modUserShow'])->name('mod.userShow');
Route::put('pannello/controllo/utenti/modifica/{user}/', [UserController::class, 'modChangeUserInfo'])->name('mod.edit');