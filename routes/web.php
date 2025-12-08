<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;
use App\Livewire\MeliEr;

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

// Rute Publik (Home Page)
Route::view('/', 'welcome')->name('home');

// Rute Redirect (Mengarah ke rute bernama 'meli-er')
// Catatan: Jika 'meli-er' di bawah membutuhkan auth, maka redirect ini juga akan memaksa login.
Route::redirect('/dashboard', '/meli-er');

// Rute MeliEr (Dashboard) - Didefinisikan sekali dengan middleware 'auth'
// Ini adalah definisi yang benar untuk dashboard yang memerlukan login.
Route::get('/meli-er', MeliEr::class)->middleware('auth')->name('meli-er'); 
// Pastikan tidak ada duplikasi lagi di Route::middleware('auth')->group(function () { ... });

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
