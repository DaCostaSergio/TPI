<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/test', [GameController::class, 'testRequest']);
Route::get('/start',[GameController::class,'startGame']);
Route::get('/dealerCards', [GameController::class,'getDealerCards']);
Route::get('/playerCards', [GameController::class,'getPlayerCards']);
Route::get('/getSumCards', [GameController::class,'getSumCards']);
Route::post('/game_status/{id}', [GameController::class,'game_status']);
Route::get('/card', [GameController::class,'showCards']);
//Route::get('/card', [GameController::class,'getOneUserCards']);

Route::get('/player', [UserController::class,'current']);
Route::get('/players/count', [UserController::class, 'count']);

