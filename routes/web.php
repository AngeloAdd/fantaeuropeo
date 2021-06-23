<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;


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
Route::get('/errore/incontro/{game?}/{next_game}', [BetController::class, 'gameError'])->name('errore.fase');
// L'incontro è oscurato perchè troppo lontano
Route::get('/pronostico/incontro/{game}/validazione/menu',[BetController::class, 'timeValidationFromMenu'])->name('bet.menu');
Route::get('/pronostico/incontro/{game}/validazione/input',[BetController::class, 'timeValidationFromInput'])->name('bet.input');

/* routes per password */

Route::get('profilo/utente/reset', [UserController::class, 'resetPassword'])->name('password.reset');
Route::put('password/store', [UserController::class, 'storePassword'])->name('password.store');

/* rotte per moderatori */
Route::get('pannello/controllo', [UserController::class, 'modIndex'])->name('mod.index');

//gestione degli users
Route::get('pannello/controllo/utenti', [UserController::class, 'modUsersIndex'])->name('mod.usersIndex');
Route::get('pannello/controllo/crea/utente', [UserController::class, 'modUserCreate'])->name('mod.userCreate');
Route::post('pannello/controllo/nuovo/utente/creato', [UserController::class, 'modUserStore'])->name('mod.userStore');
Route::get('pannello/controllo/utenti/{user}', [UserController::class, 'modUserEdit'])->name('mod.userEdit');
Route::put('pannello/controllo/utenti/modifica/{user}/', [UserController::class, 'modUserUpdate'])->name('mod.userUpdate');
Route::delete('pannello/controllo/cancella/{user}', [UserController::class, 'modUserDelete'])->name('mod.userDelete');

// gestione partite
Route::get('pannello/controllo/partite', [GameController::class, 'gamesIndex'])->name('mod.gamesIndex');
Route::get('pannello/controllo/modifica/partita/{game}', [GameController::class, 'gameEdit'])->name('mod.gameEdit');
Route::put('pannello/controllo/aggiorna/partita/{game}', [GameController::class, 'gameUpdate'])->name('mod.gameUpdate');
Route::put('pannello/controllo/inserisci/squadre/{game}', [GameController::class, 'setGame'])->name('mod.setGame');

// classifica
Route::get('classifica', [UserController::class, 'officialStanding'])->name('standing');