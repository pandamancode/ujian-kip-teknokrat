<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(array('middleware' => ['api']), function () {
    Route::get('daftar_ulang', [ApiController::class, 'daftar_ulang'])->name('daftar_ulang');
    Route::post('pmbValidasi', [ApiController::class, 'pmbValidasi'])->name('pmbValidasi');
    Route::post('daftarulangValidasi', [ApiController::class, 'daftarulangValidasi'])->name('daftarulangValidasi');
    Route::get('sinkronisasi', [ApiController::class, 'sinkronisasi'])->name('sinkronisasi');

	// get for mbp
    Route::get('data_sudah_ujian_spmb', [ApiController::class, 'data_sudah_ujian_spmb'])->name('data_sudah_ujian_spmb');
	Route::get('data_sudah_ujian_spmb_new', [ApiController::class, 'data_sudah_ujian_spmb_new'])->name('data_sudah_ujian_spmb_new');
	Route::get('pmb_sudah_bayar', [ApiController::class, 'pmb_sudah_bayar'])->name('pmb_sudah_bayar');	

});