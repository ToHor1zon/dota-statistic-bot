<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/get-match-image', [DiscordServerController::class, 'getMatchImage']);
Route::get('/get-player-image', [DiscordServerController::class, 'getPlayerImage']);
Route::get('/get-finally-image', [DiscordServerController::class, 'getFoo']);
