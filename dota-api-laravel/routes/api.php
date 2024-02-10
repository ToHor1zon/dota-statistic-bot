<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('users', UserController::class)->except([
    'create', 'edit'
]);


Route::resource('steam_accounts', SteamAccountController::class)->except([
    'create', 'edit'
]);

Route::group(['prefix' => 'commands'], function () {
    Route::post('init', [DiscordServerController::class, 'init']);
    Route::post('sign-up', [DiscordServerController::class, 'signUp']);
});
