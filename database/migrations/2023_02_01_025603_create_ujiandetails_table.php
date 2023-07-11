<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjiandetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujiandetails', function (Blueprint $table) {
            $table->id();
            $table->string('no_telepon');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('soal_id');
            $table->string('no_soal');
            $table->string('jawaban')->nullable();
            $table->string('point')->nullable();
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
        Schema::dropIfExists('ujiandetails');
    }
}
