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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//route controller pendaftar
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
//Route::put('/formulir1/update', 'Formulir1Controller@update')->name('formulir1.update');
// routes/web.php
// Route::get('/formulir1', [MakulController::class, 'showForm'])->name('formulir1.index');
// Route::put('/formulir1/update', [MakulController::class, 'filtermakul'])->name('formulir1.update');

// Route::get('/form/{prodis_id}', [MakulController::class, 'showForm'])->name('formulir1/index');
// Route::post('/form/{prodis_id}/filter', [MakulController::class, 'filterMataKuliah'])->name('formulir1.filter');

// Route::get('/pendaftar/home', [PendaftarController::class, 'home'])->name('pendaftars.home');

// Route::get('pendaftar/home', function () {
//     return view('pendaftar_home');
// });
// Route::get('/pendaftar/home', [PendaftarController::class, 'index'])->name('pendaftars.index');
// Route::get('/pendaftar/create', [PendaftarController::class, 'create'])->name('pendaftars.create');
// Route::get('/pendaftar/edit', [PendaftarController::class, 'edit'])->name('pendaftars.edit');
// Route::resource('prodis', ProdiController::class);
