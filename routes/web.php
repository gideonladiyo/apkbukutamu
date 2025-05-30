<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TamuAdminController;
use App\Http\Controllers\TamuReservasiController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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



Auth::routes();

Route::get('auth/redirect', [LoginController::class, 'redirectToGoogle']);
Route::get('/auth/callback', [LoginController::class, 'handleCallback']);

Route::post('/tamu/store', [TamuController::class, 'store'])->name('tamu.store');
Route::get('/tamu/data', [TamuController::class, 'data'])->name('tamu.data');
Route::get('/tamu/rawdata', [TamuController::class, 'rawdata'])->name('tamu.rawdata');
Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
Route::get('/reservasi/store', [ReservasiController::class, 'store'])->name('reservasi.store');
Route::get('/reservasi/data', [ReservasiController::class, 'data'])->name('reservasi.data');
Route::get('/reservasi/all-data', [ReservasiController::class, 'allData'])->name('reservasi.allData');
Route::get('/', [TamuController::class, 'index']);

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/admin', [HomeController::class, 'index'])->name('home');
    Route::get('/useradmin', [UserController::class, 'indexAdmin'])->name('useradmin');
    Route::get('/userpetugas', [UserController::class, 'indexPetugas'])->name('userpetugas');
    Route::get('/user/data/admin', [UserController::class, 'dataAdmin'])->name('user.data.admin');
    Route::get('/user/data/petugas', [UserController::class, 'dataPetugas'])->name('user.data.petugas');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/admintamu', [TamuAdminController::class, 'index'])->name('admintamu');
    Route::get('/admintamu/data', [TamuAdminController::class, 'data'])->name('admintamu.data');
    Route::post('/admintamu/store', [TamuAdminController::class, 'store'])->name('admintamu.store');
    Route::get('/admintamu/edit', [TamuAdminController::class, 'edit'])->name('admintamu.edit');
    Route::post('/admintamu/update', [TamuAdminController::class, 'update'])->name('admintamu.update');
    Route::delete('/admintamu/destroy', [TamuAdminController::class, 'destroy'])->name('admintamu.destroy');
    Route::get('/admintamu/cetak_pdf', [TamuAdminController::class, 'cetak'])->name('cetak.tamu');
    Route::get('/admintamu/export_excell', [TamuAdminController::class, 'export_excell'])->name('export.exell.tamu');

    Route::get('/adminreservasi', [TamuReservasiController::class, 'index'])->name('adminreservasi');
    Route::get('/adminreservasi/data', [TamuReservasiController::class, 'data'])->name('adminreservasi.data');
    Route::post('/adminreservasi/store', [TamuReservasiController::class, 'store'])->name('adminreservasi.store');
    Route::get('/adminreservasi/edit', [TamuReservasiController::class, 'edit'])->name('adminreservasi.edit');
    Route::post('/adminreservasi/update', [TamuReservasiController::class, 'update'])->name('adminreservasi.update');
    Route::delete('/adminreservasi/destroy', [TamuReservasiController::class, 'destroy'])->name('adminreservasi.destroy');
    Route::post('/adminreservasi/accept', [TamuReservasiController::class, 'accept'])->name('adminreservasi.accept');
    Route::put('/adminreservasi/update_jadwal', [TamuReservasiController::class, 'updateJadwal'])->name('adminreservasi.updateJadwal');
    Route::get('/adminreservasi/cetak_pdf', [TamuReservasiController::class, 'cetak'])->name('cetak.reservasi');
    Route::get('/adminreservasi/export_excell', [TamuReservasiController::class, 'export_excell'])->name('export.exell.reservasi');

    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('/pegawai/data', [PegawaiController::class, 'data'])->name('pegawai.data');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::post('/pegawai/update', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/pegawai/destroy', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::get('/pegawai/cetak_pdf', [PegawaiController::class, 'cetak'])->name('cetak.pegawai');
    Route::get('/pegawai/export_excel', [PegawaiController::class, 'export_excel'])->name('export.exel');
});
