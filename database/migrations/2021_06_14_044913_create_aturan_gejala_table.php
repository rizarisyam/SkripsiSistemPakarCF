<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAturanGejalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aturan_gejala', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aturan_id')->references('id')->on('aturan')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('gejala_id')->references('id')->on('gejala')->onUpdate('cascade')
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
        Schema::dropIfExists('aturan_gejala');
    }
}
