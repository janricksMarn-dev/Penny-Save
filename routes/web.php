<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PiggyController;
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


Route::controller(AuthenticationController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/check', 'check')->name('check');
    Route::post('/save', 'save')->name('save');
});



Route::middleware('auth')->group(function(){

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('piggy-bank/create', [PiggyController::class, 'create'])->name('piggy.create');
    Route::post('/piggy-bank/create', [PiggyController::class, 'store'])->name('piggy.store');
});
