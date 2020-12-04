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

Route::get('/', [\App\Http\Controllers\PublicHome\HomeController::class, 'index'])->name('home');

Route::get('login',[\App\Http\Controllers\PublicHome\HomeController::class, 'index'])->name('login');
Route::post('login',[\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('public.login.post');


Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('public.register');
Route::post('register', [\App\Http\Controllers\UserController::class, 'store'])->name('public.register.store');

Route::get('register/finish', [\App\Http\Controllers\Auth\RegisterController::class, 'registerFinish'])->name('public.register.finish');
Route::post('register/finish', [\App\Http\Controllers\Auth\RegisterController::class, 'resendVerificationEmail'])->name('public.register.resend');

Route::get('/redirect', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('google.auth');
Route::get('/callback',[\App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('google.callback');

Route::get('logout', function (){
   auth()->logout();

   return redirect()->route('home');
});

Route::post('/reset-password',[\App\Http\Controllers\Auth\ResetPasswordController::class, 'sendEmail'])->name('public.reset_password');

Route::get('password/reset/{token}', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'showForm'])->name('password.reset');
Route::post('password/reset', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'changePassword'])->name('password.reset.store');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return redirect()->route('public.register.finish');
})->middleware(['auth'])->name('verification.notice');

Route::prefix('dashboard')->middleware(['auth', 'is_agent'])->group(function (){
    Route::get('/',[\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/payments',[\App\Http\Controllers\Dashboard\DashboardController::class, 'payments'])->name('dashboard.payments');
});

Route::prefix('leads')->middleware(['auth'])->group(function(){
    Route::get('/',[\App\Http\Controllers\Leads\LeadsController::class, 'index'])->name('leads.index');
    Route::get('/questions',[\App\Http\Controllers\Leads\LeadsController::class, 'questions'])->name('leads.questions');

    Route::post('/questions',[\App\Http\Controllers\Leads\LeadsController::class, 'store'])->name('leads.questions.store');
});
