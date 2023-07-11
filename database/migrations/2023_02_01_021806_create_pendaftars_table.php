<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pendaftar')->nullable();
            $table->string('upload_foto')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki - laki', 'Perempuan'])->nullable();
            $table->string('agama')->nullable();
            $table->string('alamat_pendaftar')->nullable();
            $table->string('email')->unique();
            $table->string('no_telepon')->unique();

            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('no_telepon_orang_tua')->nullable();
            $table->string('alamat_orang_tua')->nullable();
            
            $table->unsignedBigInteger('prodi_id');
            $table->string('waktu_kuliah')->nullable();
            $table->unsignedBigInteger('jalur_id');

            $table->string('no_nisn')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('jurusan_sekolah')->nullable();
            $table->string('nilai_rata_rata_sekolah')->nullable();
            $table->string('tahun_lulus_sekolah')->nullable();
            $table->string('alamat_sekolah')->nullable();

            $table->string('upload_ijazah')->nullable();
            $table->string('upload_skhu')->nullable();
            $table->string('upload_ket_sehat')->nullable();
            $table->string('upload_buta_warna')->nullable();
            $table->string('upload_ktp')->nullable();
            $table->string('upload_kk')->nullable();
            $table->string('upload_foto_full_body')->nullable();
            $table->string('upload_data_mahasiswa')->nullable();
            $table->string('upload_surat_pernyataan')->nullable();

            
            $table->string('no_va_pmb')->nullable();
            $table->string('no_va_daftar_ulang')->nullable();
            
            $table->date('tanggal_daftar')->nullable();
            $table->date('tanggal_pembayaran_pmb')->nullable();
            $table->enum('status_pembayaran_pmb', ['belum bayar', 'sudah bayar'])->default('belum bayar');
            $table->date('tanggal_pembayaran_daftar_ulang')->nullable();
            $table->enum('status_pembayaran_daftar_ulang', ['belum bayar', 'sudah bayar'])->default('belum bayar');
            
            $table->enum('status_jalur_raport', ['Tidak Daftar','Terima','Tolak','Menunggu'])->default('Tidak Daftar');
            $table->string('nilai_raport')->nullable();
            $table->string('upload_raport')->nullable();

            $table->string('tahun_daftar')->nullable();
            $table->unsignedBigInteger('gelombang_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftars');
    }
}
