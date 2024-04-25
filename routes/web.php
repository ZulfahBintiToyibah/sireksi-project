<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KodeskripsiController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AslabController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\ProfiladminController;
use App\Http\Controllers\PengumpulanController;

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

Route::get('dashboard', function () {
    return view('admin/dashboard');
})->name('dashboard');
Route::get('dashboard2', function () {
    return view('aslab/dashboard');
})->name('dashboard2');
Route::get('dashboard3', function () {
    return view('mahasiswa/dashboard');
})->name('dashboard3');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginproces', [AuthController::class, 'processLogin'])->name('loginproces');

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
Route::get('/laporan-mahasiswa', [MahasiswaController::class, 'index2'])->name('laporan-mahasiswa');
Route::get('/create-mahasiswa', [MahasiswaController::class, 'create'])->name('create-mahasiswa');
Route::post('/insert-mahasiswa', [MahasiswaController::class, 'store'])->name('insert-mahasiswa');
Route::get('/tampil-mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('tampil-mahasiswa');
Route::get('/detail-mahasiswa/{id}', [MahasiswaController::class, 'detail'])->name('detail-mahasiswa');
Route::post('/update-mahasiswa/{id}', [MahasiswaController::class, 'edit'])->name('update-mahasiswa');
Route::get('/delete-mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('delete-mahasiswa');

Route::get('/skripsi', [SkripsiController::class, 'index'])->name('skripsi');
Route::get('/tampil-skripsi/{id}', [SkripsiController::class, 'show'])->name('tampil-skripsi');
Route::get('/detail-skripsi/{id}', [SkripsiController::class, 'detail'])->name('detail-skripsi');
Route::post('/update-skripsi/{id}', [SkripsiController::class, 'edit'])->name('update-skripsi');
Route::get('/delete-skripsi/{id}', [SkripsiController::class, 'destroy'])->name('delete-skripsi');
Route::get('/create-skripsi', [SkripsiController::class, 'create'])->name('create-skripsi');
Route::post('/submit-skripsi', [SkripsiController::class, 'submitSkripsi'])->name('skripsi.submit');
Route::post('/confirm-skripsi', [SkripsiController::class, 'confirmSkripsi'])->name('confirm-skripsi');

Route::get('/profiladmin', [ProfiladminController::class, 'index'])->name('profiladmin');
Route::get('/edit-profil/{id}', [ProfiladminController::class, 'show'])->name('edit-profil');
Route::post('/update-profil/{id}', [ProfiladminController::class, 'edit'])->name('update-profil');

Route::get('/konfirmasi-pengumpulan', [PengumpulanController::class, 'index'])->name('konfirmasi-pengumpulan');
Route::get('/laporan-konfir', [PengumpulanController::class, 'index2'])->name('laporan-konfir');
Route::get('/tampil-konfirmasi/{id}', [PengumpulanController::class, 'show'])->name('tampil-konfirmasi');
Route::post('/update-konfirmasi/{id}', [PengumpulanController::class, 'edit'])->name('update-konfirmasi');
Route::get('/delete-konfirmasi/{id}', [PengumpulanController::class, 'destroy'])->name('delete-konfirmasi');
Route::post('/konfir-pengumpulan/{id}', [PengumpulanController::class, 'konfir'])->name('konfir-pengumpulan');


