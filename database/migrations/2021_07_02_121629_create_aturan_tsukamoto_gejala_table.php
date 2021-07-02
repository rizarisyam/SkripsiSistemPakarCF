<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAturanTsukamotoGejalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aturan_tsukamoto_gejala', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aturan_tsukamoto_id')->references('id')->on('aturan_tsukamoto')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('himpunan_id')->references('id')->on('himpunan')->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('aturan_tsukamoto_gejala');
    }
}
