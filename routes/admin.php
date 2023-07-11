<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\GelombangController;
use App\Http\Controllers\Admin\JalurController;
use App\Http\Controllers\Admin\PendaftarController;
use App\Http\Controllers\Admin\KategorisoalController;
use App\Http\Controllers\Admin\SoalController;
use App\Http\Controllers\Admin\UjianController;
use App\Http\Controllers\Admin\RaportController;
use App\Http\Controllers\Admin\BuatakunController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\DurasiController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PengumumanController;

Route::resource('/admin/pengguna', PenggunaController::class)->names('admin.pengguna');
Route::resource('/admin/pengumuman', PengumumanController::class)->names('admin.pengumuman');

Route::get('/admin/dashboard', [HomeController::class, 'index'])->middleware(['auth:admin'])->name('admin.dashboard');

// buat akun
Route::get('/admin/buat-akun', [BuatakunController::class, 'index'])->middleware(['auth:admin'])->name('admin.buatAkun.index');
Route::get('/admin/buat-akun/hapus', [BuatakunController::class, 'show'])->middleware(['auth:admin'])->name('admin.buatAkun.show');
Route::post('/admin/buat-akun/delete', [BuatakunController::class, 'destroy'])->middleware(['auth:admin'])->name('admin.buatAkun.destroy');
Route::put('/admin/buat-akun/reset-password/{id}', [BuatakunController::class, 'resetPassword'])->middleware(['auth:admin'])->name('admin.buatAkun.resetPassword');

// Gelombang
Route::get('/admin/gelombang', [GelombangController::class, 'index'])->middleware(['auth:admin']);
Route::get('/admin/gelombang/create', [GelombangController::class, 'create'])->middleware(['auth:admin']);
Route::post('/admin/gelombang/store', [GelombangController::class, 'store'])->middleware(['auth:admin']);
Route::get('/admin/gelombang/edit', [GelombangController::class, 'edit'])->middleware(['auth:admin']);
Route::post('/admin/gelombang/update', [GelombangController::class, 'update'])->middleware(['auth:admin']);
Route::get('/admin/gelombang/hapus', [GelombangController::class, 'hapus'])->middleware(['auth:admin']);
Route::post('/admin/gelombang/delete', [GelombangController::class, 'delete'])->middleware(['auth:admin']);

// Jalur
Route::get('/admin/jalur', [JalurController::class, 'index'])->middleware(['auth:admin']);
Route::get('/admin/jalur/create', [JalurController::class, 'create'])->middleware(['auth:admin']);
Route::post('/admin/jalur/store', [JalurController::class, 'store'])->middleware(['auth:admin']);
Route::get('/admin/jalur/edit', [JalurController::class, 'edit'])->middleware(['auth:admin']);
Route::post('/admin/jalur/update', [JalurController::class, 'update'])->middleware(['auth:admin']);
Route::get('/admin/jalur/hapus', [JalurController::class, 'hapus'])->middleware(['auth:admin']);
Route::post('/admin/jalur/delete', [JalurController::class, 'delete'])->middleware(['auth:admin']);

// Pendaftar
Route::get('/admin/pendaftar', [PendaftarController::class, 'index'])->middleware(['auth:admin'])->name('admin.daftar.index');
Route::get('/admin/pendaftar/create', [PendaftarController::class, 'create'])->middleware(['auth:admin']);
Route::post('/admin/pendaftar/store', [PendaftarController::class, 'store'])->middleware(['auth:admin']);
Route::get('/admin/pendaftar/edit', [PendaftarController::class, 'edit'])->middleware(['auth:admin']);
Route::patch('/admin/pendaftar/update/{id}', [PendaftarController::class, 'update'])->middleware(['auth:admin'])->name('admin.daftar.update');
Route::get('/admin/pendaftar/hapus', [PendaftarController::class, 'show'])->middleware(['auth:admin']);
Route::post('/admin/pendaftar/delete', [PendaftarController::class, 'destroy'])->middleware(['auth:admin']);
Route::put('/admin/pendaftar/reset-password/{id}', [PendaftarController::class, 'resetPassword'])->middleware(['auth:admin'])->name('admin.pendaftar.resetPassword');
Route::get('/admin/pendaftar/validasi-raport/{id}', [PendaftarController::class, 'showvalidasiRaport'])->middleware(['auth:admin'])->name('admin.pendaftar.modalvalidasiRaport');
Route::patch('/admin/raport/validasi/{id}', [PendaftarController::class, 'validasiRaport'])->middleware(['auth:admin'])->name('admin.pendaftar.validasiRaport');
Route::put('/admin/pendaftar/validasi-pembayaran/{id}', [PendaftarController::class, 'validasiPembayaranPmb'])->middleware(['auth:admin'])->name('admin.pendaftar.validasiPembayaranPmb');
Route::get('/admin/pendaftar/bukti-pembayaran-pmb/{id}', [PendaftarController::class, 'showBuktiPembayaranPmb'])->middleware(['auth:admin'])->name('admin.pendaftar.showBuktiPembayaranPmb');
Route::get('/admin/pendaftar/check-data/{id}', [PendaftarController::class, 'checkDataPendaftar'])->middleware(['auth:admin'])->name('admin.pendaftar.checkDataPendaftar');

Route::post('/admin/pendaftar/import-data', [PendaftarController::class, 'import_data'])->middleware(['auth:admin'])->name('admin.pendaftar.import-data');

// Kategori Soal
Route::get('/admin/kategori', [KategorisoalController::class, 'index'])->middleware(['auth:admin'])->name('admin.kategori');
Route::get('/admin/kategori/create', [KategorisoalController::class, 'create'])->middleware(['auth:admin'])->name('admin.kategoricreate');
Route::get('/admin/kategori/edit', [KategorisoalController::class, 'edit'])->middleware(['auth:admin'])->name('admin.kategoriedit');
Route::get('/admin/kategori/hapus', [KategorisoalController::class, 'show'])->middleware(['auth:admin'])->name('admin.kategorihapus');
Route::post('/admin/kategori/store', [KategorisoalController::class, 'store'])->middleware(['auth:admin'])->name('admin.kategoristore');
Route::post('/admin/kategori/update', [KategorisoalController::class, 'update'])->middleware(['auth:admin'])->name('admin.kategoriupdate');
Route::post('/admin/kategori/destroy', [KategorisoalController::class, 'destroy'])->middleware(['auth:admin'])->name('admin.kategoridestroy');


// Soal
Route::get('/admin/soal', [SoalController::class, 'index'])->middleware(['auth:admin'])->name('admin.soal');
Route::get('/admin/soal/create', [SoalController::class, 'create'])->middleware(['auth:admin'])->name('admin.soalcreate');
Route::get('/admin/soal/edit', [SoalController::class, 'edit'])->middleware(['auth:admin'])->name('admin.soaledit');
Route::get('/admin/soal/hapus', [SoalController::class, 'show'])->middleware(['auth:admin'])->name('admin.soalhapus');
Route::post('/admin/soal/store', [SoalController::class, 'store'])->middleware(['auth:admin'])->name('admin.soalstore');
Route::post('/admin/soal/update', [SoalController::class, 'update'])->middleware(['auth:admin'])->name('admin.soalupdate');
Route::post('/admin/soal/destroy', [SoalController::class, 'destroy'])->middleware(['auth:admin'])->name('admin.soaldestroy');
Route::get('/admin/soal/import', [SoalController::class, 'import'])->middleware(['auth:admin'])->name('admin.soalimport');
Route::post('admin/soal/import_soal',[SoalController::class, 'import_soal'])->middleware(['auth:admin'])->name('admin.soalimportprocess');

// data ujian
Route::get('/admin/ujian', [UjianController::class, 'index'])->middleware(['auth:admin'])->name('admin.ujian');
Route::delete('/admin/ujian/delete/{id}', [UjianController::class, 'delete'])->middleware(['auth:admin'])->name('admin.ujian.destroy');

Route::get('/admin/laporan', [LaporanController::class, 'laporan'])->name('admin.laporan')->middleware('auth:admin');
Route::get('/admin/laporan-berdasarkan-tanggal/filter', [LaporanController::class, 'filter_laporan_berdasarkan_tanggal'])->name('admin.laporan_berdasarkan_tanggal.filter')->middleware('auth:admin');
Route::get('/admin/laporan-profil-berdasarkan-tanggal/filter', [LaporanController::class, 'filter_laporan_profil_berdasarkan_tanggal'])->name('admin.laporan_profil_berdasarkan_tanggal.filter')->middleware('auth:admin');

Route::resource('/admin/durasi', DurasiController::class)->names('admin.durasi');

