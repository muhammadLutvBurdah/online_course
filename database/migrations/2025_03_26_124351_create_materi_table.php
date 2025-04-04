<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id('materiid');
            $table->unsignedBigInteger('kursusid');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('durasi');
            $table->timestamps();

            $table->foreign('kursusid')->references('kursusid')->on('kursus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi');
    }
}
