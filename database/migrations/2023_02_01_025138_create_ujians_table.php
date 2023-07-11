<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujians', function (Blueprint $table) {
            $table->id();
            $table->string('no_telepon');
            $table->unsignedBigInteger('user_id');
            $table->string('nilai');
            $table->enum('status_ujian', ['sudah ujian', 'sedang ujian','belum ujian'])->default("belum ujian");
            $table->integer('durasi');
            $table->datetime('waktu_mulai');
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
        Schema::dropIfExists('ujians');
    }
}
