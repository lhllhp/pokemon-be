<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/pokemon', [\App\Http\Controllers\PokemonController::class, 'getPokemonList'])->name('pokemonList');
Route::get('/pokemon/{id}', [\App\Http\Controllers\PokemonController::class, 'getPokemonDetail'])->name('pokemonDetail');
