<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('pembayaranid');
            $table->unsignedBigInteger('kursusid');
            $table->string('tujuan_tf');
            $table->date('tanggal_tf');
            $table->decimal('jumlah_pembayaran', 10, 2);
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
        Schema::dropIfExists('pembayaran');
    }
}
