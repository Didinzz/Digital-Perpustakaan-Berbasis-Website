<?php

use App\Exports\BukuExport;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KategoriController;
use App\Models\Buku;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProses'])->name('register.proses');
Route::post('/login', [AuthController::class, 'loginProses'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['user'])->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('', [Controller::class, 'dashbord'])->name('index');
        Route::resource('buku', BukuController::class)->names('buku');
        Route::resource('kategori', KategoriController::class)->names('kategori');
        Route::get('/export-buku-excel', [BukuController::class, 'exportExcel'])->name('export.buku.excel');
        Route::get('/export-buku-pdf', [BukuController::class, 'exportPdf'])->name('export.buku.pdf');
        Route::get('/List-Buku-Saya', [BukuController::class, 'bukuUser'])->name('buku.user');
    });
});
