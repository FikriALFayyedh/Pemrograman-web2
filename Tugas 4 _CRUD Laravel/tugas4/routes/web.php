<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UploadgambarController;

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

Route::get('/', function () {
    return view('Pengguna.Login');
});
Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/login', function () {
    return view('Pengguna.login');
})->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('login.postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.logout');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/beranda',[LoginController::class,'showDataPengguna'])->name('LoginController.showDataPengguna');

    Route::post('/simpan-pegawai', [PegawaiController::class, 'store'])->name('simpan-pegawai.store');
    Route::get('/create-pegawai', [PegawaiController::class, 'create'])->name('create-pegawai.create');
    Route::get('/data-pegawai', [PegawaiController::class, 'index'])->name('data-pegawai.index');
    Route::get('/edit-pegawai/{id}', [PegawaiController::class, 'edit'])->name('edit-pegawai.edit');
    Route::post('/update-pegawai/{id}', [PegawaiController::class, 'update'])->name('update-pegawai.update');
    Route::get('/delete-pegawai/{id}', [PegawaiController::class, 'destroy'])->name('delete-pegawai.destroy');

    Route::get('/data-gambar', [UploadgambarController::class, 'index'])->name('data-gambar.index');
    Route::get('/create-gambar', [UploadgambarController::class, 'create'])->name('create-gambar.create');
    Route::post('/simpan-gambar', [UploadgambarController::class, 'store'])->name('simpan-gambar.store');
    Route::get('/edit-gambar/{id}', [UploadgambarController::class, 'edit'])->name('edit-gambar.edit');
    Route::post('/update-gambar/{id}', [UploadgambarController::class, 'update'])->name('update-gambar.update');
    Route::get('/delete-gambar/{id}', [UploadgambarController::class, 'destroy'])->name('delete-gambar.destroy');
});





