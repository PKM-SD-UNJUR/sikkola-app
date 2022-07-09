<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_form', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->time('deadline');
            $table->text('deskripsi');

            $table->unsignedBigInteger('latihan_id');
            $table->foreign('latihan_id')->references('id')->on('latihan');

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
        Schema::dropIfExists('submit_form');
    }
};
