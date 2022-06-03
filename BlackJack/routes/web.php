<?php

use http\Client\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GameController;
use \App\Http\Controllers\UserController;

use Inertia\Inertia;

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

//Route for Login screen
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

//get User info
Route::get('/players', [UserController::class,'index'])->name('user');

/*Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

//Route for Component Home
Route::get('/home', function () {
    //return "hello";
    return Inertia::render('Home');
})->middleware(['auth', 'verified'])->name('home');

//Route for Component Game
Route::get('/game', function () {
    //return "hello";
    return Inertia::render('Game');
})->name('game');

//Route for Component Header
Route::get('/Header', function (){
    return Inertia::render('HeaderInfo');
});

//Route for Component HeaderGame
Route::get('/HeaderGame', function (){
    return Inertia::render('GameInfo');
});

//Route for Component Header
Route::get('/dealerCards', function (){
    return Inertia::render('DealerCards');
});

//Route to get the current User
Route::get('/current', function() {
    return auth()->user();
})->middleware('auth:sanctum');


require __DIR__.'/auth.php';
