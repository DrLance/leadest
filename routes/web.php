<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::post('login',[\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('public.login.post');

Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('public.register');
Route::post('register', [\App\Http\Controllers\UserController::class, 'store'])->name('public.register.store');

Route::get('/redirect', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('google.auth');
Route::get('/callback',[\App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('google.callback');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
