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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->text('soal');
            $table->string('soalGambar')->nullable();
            $table->text('opsi1');
            $table->text('opsi2');
            $table->text('opsi3');
            $table->text('opsi4');
            $table->double('score')->nullable();
            $table->string('jawaban');
            $table->string('jawabanGambar')->nullable();
            $table->text('pembahasan')->nullable();
            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('quizzes');   
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
        Schema::dropIfExists('soals');
    }
};
