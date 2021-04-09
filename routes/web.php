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
});

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('user.authenticate');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::post('/register', [UserController::class, 'register'])->name('user.register');
