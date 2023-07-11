<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UjianController;
use App\Http\Controllers\User\UploadpersyaratanController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return redirect('/login');
})->name('home');

Route::get('/clear-cache', function () {
   Artisan::call('cache:clear');
   Artisan::call('route:clear');

   return "Cache cleared successfully";
});


// user
require __DIR__.'/auth.php';
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth:web'])->name('dashboard');
Route::post('/daftar', [HomeController::class, 'daftar'])->middleware(['auth:web'])->name('user.daftar');
Route::get('/profil', [HomeController::class, 'profil'])->middleware(['auth:web'])->name('user.profil');
Route::get('/profil/edit', [HomeController::class, 'editProfil'])->middleware(['auth:web'])->name('user.edit.profil');
Route::patch('/profil/update', [HomeController::class, 'updateProfil'])->middleware(['auth:web'])->name('user.updateProfil');
Route::get('/informasi-pembayaran', [HomeController::class, 'informasiPembayaran'])->middleware(['auth:web'])->name('user.informasiPembayaran');
Route::get('/pengumuman', [HomeController::class, 'pengumuman'])->middleware(['auth:web'])->name('user.pengumuman');

// umum
Route::get('/upload-persyaratan', [UploadpersyaratanController::class, 'uploadPersyaratan'])->middleware(['auth:web'])->name('user.uploadPersyaratan');
Route::get('/upload-persyaratan/edit', [UploadpersyaratanController::class, 'uploadPersyaratanEdit'])->middleware(['auth:web'])->name('user.uploadPersyaratanEdit');
Route::patch('/upload-persyaratan/update', [UploadpersyaratanController::class, 'uploadPersyaratanUpdate'])->middleware(['auth:web'])->name('user.uploadPersyaratanUpdate');

// raport
Route::get('/upload-raport', [UploadpersyaratanController::class, 'uploadPersyaratanRaport'])->middleware(['auth:web'])->name('user.uploadPersyaratanRaport');
Route::get('/upload-raport/edit', [UploadpersyaratanController::class, 'uploadPersyaratanRaportEdit'])->middleware(['auth:web'])->name('user.uploadPersyaratanRaportEdit');
Route::patch('/upload-raport/update', [UploadpersyaratanController::class, 'uploadPersyaratanRaportUpdate'])->middleware(['auth:web'])->name('user.uploadPersyaratanRaportUpdate');

//ujian
Route::get('/ujian', [UjianController::class, 'index'])->middleware(['auth:web'])->name('user.ujian');
Route::get('/ujian/mulai_ujian', [UjianController::class, 'mulai_ujian'])->middleware(['auth:web']);
Route::get('/ujian/pilih_soal/{id_soal}', [UjianController::class, 'pilih_soal'])->middleware(['auth:web']);
Route::post('/ujian/jawab', [UjianController::class, 'jawab'])->middleware(['auth:web'])->name('user.jawab');
Route::get('/ujian/submit', [UjianController::class, 'submit'])->middleware(['auth:web'])->name('user.submit');

// admin
require __DIR__.'/adminauth.php';
require __DIR__.'/admin.php';


