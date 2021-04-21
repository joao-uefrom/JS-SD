<?php

use App\Http\Controllers\{ApostaController, ApostadorController, InicioController, JogoController};
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

Route::get('/', [InicioController::class, 'show'])->name('inicio');

Route::resources([
    '/apostador' => ApostadorController::class,
    '/aposta' => ApostaController::class,
    '/jogo' => JogoController::class
]);

