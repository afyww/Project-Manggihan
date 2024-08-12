<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\VipController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('masuk');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'LoginAuth:admin'])->group(function () {
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/buatsurat', [PagesController::class, 'buatsurat'])->name('buatsurat');
    Route::get('/profil', [PagesController::class, 'profil'])->name('profil');
    Route::get('/search', [PagesController::class, 'search'])->name('search');
    Route::get('/history', [SuratController::class, 'index'])->name('history');
    Route::get('/filter', [SuratController::class, 'filter'])->name('filter');
    Route::get('/suratexport', [SuratController::class, 'export'])->name('export');
    Route::get('/suratindividu', [PagesController::class, 'suratindividu'])->name('suratindividu');
    Route::get('/suratkolektif', [PagesController::class, 'suratkolektif'])->name('suratkolektif');
    Route::post('/individu-pdf', [PdfController::class, 'IndividuPdf'])->name('individu-pdf');
    Route::post('/kolektif-pdf', [PdfController::class, 'KolektifPdf'])->name('kolektif-pdf');
    Route::get('/download/{id}', [PdfController::class, 'download'])->name('download');
});

Route::middleware(['auth', 'LoginAuth:admin,user'])->group(function () {
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/buatsurat', [PagesController::class, 'buatsurat'])->name('buatsurat');
    Route::get('/profil', [PagesController::class, 'profil'])->name('profil');
    Route::get('/filter', [SuratController::class, 'filter'])->name('filter');
    Route::get('/suratindividu', [PagesController::class, 'suratindividu'])->name('suratindividu');
    Route::get('/suratkolektif', [PagesController::class, 'suratkolektif'])->name('suratkolektif');
    Route::post('/individu-pdf', [PdfController::class, 'IndividuPdf'])->name('individu-pdf');
    Route::post('/kolektif-pdf', [PdfController::class, 'KolektifPdf'])->name('kolektif-pdf');
});
