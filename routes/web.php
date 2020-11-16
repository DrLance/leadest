<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('login',[\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('public.login');
Route::get('/redirect', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('google.auth');
Route::get('/callback',[\App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('google.callback');
