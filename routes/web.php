<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\CpmkController;
use App\Http\Controllers\MakulController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\Form1Controller;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Route untuk autentikasi
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Route yang hanya bisa diakses setelah login
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::resource('pendaftars', PendaftarController::class);
    Route::resource('prodis', ProdiController::class);
    Route::resource('asesors', AsesorController::class);
    Route::resource('cpmks', CpmkController::class);
    Route::resource('makuls', MakulController::class);
    Route::resource('tahun_akademiks', TahunAkademikController::class);
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('role', RoleController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('hak_akses', HakAksesController::class);

    Route::get('/form1', [Form1Controller::class, 'index'])->name('form1.index');
});
