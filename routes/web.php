<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MatkulController;

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

Route::get('/flush-session', [LogoutController::class, 'flush']);

Route::get('/', function () {
    return view('landingpage.index');
});

Auth::routes();

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('auth');
Route::post('/mahasiswa/tambah', [MahasiswaController::class, 'tambahMatkul'])->name('mahasiswa/tambah');
Route::post('/mahasiswa/hapus', [MahasiswaController::class, 'hapusMatkul'])->name('mahasiswa/hapus');

Route::get('/dosen', [DosenController::class, 'index'])->middleware('auth');
Route::post('/dosen/ampu', [DosenController::class, 'ampuMatkul'])->name('dosen/ampu');
Route::post('/dosen/hapus', [DosenController::class, 'hapusMatkul'])->name('dosen/hapus');


Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin');
Route::get('/admin/tambah', [MatkulController::class, 'index'])->name('admin/tambah');
Route::post('/admin/tambah', [MatkulController::class, 'tambah'])->name('admin/tambah');
Route::get('/admin/edit', [MatkulController::class, 'indexedit'])->name('admin/edit');
Route::post('/admin/edit', [MatkulController::class, 'edit'])->name('admin/edit');
Route::post('/admin/hapus', [MatkulController::class, 'hapus'])->name('admin/hapus');