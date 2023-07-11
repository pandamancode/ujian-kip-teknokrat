<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramstudisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programstudis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_program_studi');
            $table->string('nama_program_studi');
            $table->string('nama_english_program_studi');
            $table->string('singkatan_program_studi')->nullable();
            $table->text('keterangan_program_studi')->nullable();
            $table->enum('status_program_studi', ['Tidak Aktif', 'Aktif'])->default("Aktif");
            $table->enum('status_program_studi_karyawan', ['Tidak Aktif', 'Aktif'])->default("Aktif");
            $table->unsignedBigInteger('fakultas_id');
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
        Schema::dropIfExists('programstudis');
    }
}
