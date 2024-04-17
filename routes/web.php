<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KodeskripsiController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AuthController;

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
Route::get('login', function () {
    return view('auth/login');
})->name('login');

Route::get('dashboard', function () {
    return view('admin/dashboard');
})->name('dashboard');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginproces', [AuthController::class, 'processLogin'])->name('loginproces');

// ROUTE ADMIN
Route::get('/kodeskripsi', [KodeskripsiController::class, 'index'])->name('kodeskripsi');
Route::get('/create-kodeskripsi', [KodeskripsiController::class, 'create'])->name('create-kodeskripsi');
Route::post('/insert-kodeskripsi', [KodeskripsiController::class, 'store'])->name('insert-kodeskripsi');
Route::get('/tampil-kodeskripsi/{id}', [KodeskripsiController::class, 'show'])->name('tampil-kodeskripsi');
Route::post('/update-kodeskripsi/{id}', [KodeskripsiController::class, 'edit'])->name('update-kodeskripsi');
Route::get('/delete-kodeskripsi/{id}', [KodeskripsiController::class, 'destroy'])->name('delete-kodeskripsi');

Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi');
Route::get('/create-prodi', [ProdiController::class, 'create'])->name('create-prodi');
Route::post('/insert-prodi', [ProdiController::class, 'store'])->name('insert-prodi');
Route::get('/tampil-prodi/{id}', [ProdiController::class, 'show'])->name('tampil-prodi');
Route::post('/update-prodi/{id}', [ProdiController::class, 'edit'])->name('update-prodi');
Route::get('/delete-prodi/{id}', [ProdiController::class, 'destroy'])->name('delete-prodi');

Route::get('/dospem', [DosenController::class, 'index'])->name('dospem');
Route::get('/create-dospem', [DosenController::class, 'create'])->name('create-dospem');
Route::post('/insert-dospem', [DosenController::class, 'store'])->name('insert-dospem');
Route::get('/tampil-dospem/{id}', [DosenController::class, 'show'])->name('tampil-dospem');
Route::post('/update-dospem/{id}', [DosenController::class, 'edit'])->name('update-dospem');
Route::get('/delete-dospem/{id}', [DosenController::class, 'destroy'])->name('delete-dospem');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
Route::get('/create-mahasiswa', [MahasiswaController::class, 'create'])->name('create-mahasiswa');
Route::post('/insert-mahasiswa', [MahasiswaController::class, 'store'])->name('insert-mahasiswa');
Route::get('/tampil-mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('tampil-mahasiswa');
Route::get('/detail-mahasiswa/{id}', [MahasiswaController::class, 'detail'])->name('detail-mahasiswa');
Route::post('/update-mahasiswa/{id}', [MahasiswaController::class, 'edit'])->name('update-mahasiswa');
Route::get('/delete-mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('delete-mahasiswa');

Route::get('konfirmasi', function () {
    return view('konfirmasi_pengumpulan/data-konfirmasi');
})->name('konfirmasi');