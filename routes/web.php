<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::view('/minha-conta', 'user.account')->name('user.account');
    Route::post('/minha-conta', [UserController::class, 'account'])->name('user.account');
});

// LoginController
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/forgot-password', [LoginController::class, 'forgotPassword'])->name('login.forgot-password');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/new-password/{email}/{token}', [LoginController::class, 'newPassword'])->name('login.new-password');
Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('login.reset-password');

// UserController
Route::post('/register', [UserController::class, 'register'])->name('user.register');
