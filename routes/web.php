<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('register/{email?}', [RegisterController::class, 'register'])->name('register');
Route::post('register/', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth:web')->group(function () {
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/home', [HomeController::class, 'balanceRefill'])->name('balanceRefill');
        Route::post('/home', [HomeController::class, 'refillAction'])->name('refillAction');
        Route::get('/invite', [HomeController::class, 'invite'])->name('invite');
        Route::post('/invite', [HomeController::class, 'inviteAction'])->name('inviteAction');
    });
});


