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
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->string('topik');
            $table->string('judul');
            $table->string('tanggal');
            $table->time('waktumulai');
            $table->time('waktuselesai');
            $table->string('video')->nullable();
            $table->string('file')->nullable();
            $table->text('deskripsi')->nullable();
            $table->foreignId('kelas_id');
            $table->foreignId('mapel_id');
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
        Schema::dropIfExists('materis');
    }
};
