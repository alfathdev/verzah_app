<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuncisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuncis', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_angkatan');
            $table->integer('p');
            $table->integer('q');
            $table->integer('n');
            $table->integer('m');
            $table->integer('e');
            $table->integer('d');
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
        Schema::dropIfExists('kuncis');
    }
}
