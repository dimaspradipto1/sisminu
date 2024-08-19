<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(LoginController::class)->group(function(){
    Route::get('/', 'index')->name('login');
    Route::post('/login', 'loginproses')->name('loginproses');
    Route::get('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('checkrole: admin')->group(function(){

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('surat-masuk', SuratMasukController::class);
    Route::resource('users', UserController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('surat-keluar', SuratKeluarController::class);
});