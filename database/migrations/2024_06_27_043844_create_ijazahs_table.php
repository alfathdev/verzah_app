<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjazahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijazahs', function (Blueprint $table) {
            $table->id();
            $table->char('no_induk');
            $table->string('no_ijazah');
            $table->string('nama_siswa');
            $table->string('nama_ortu');
            $table->integer('tahun_lulus');
            $table->string('pengesah');
            $table->boolean('is_signed');
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
        Schema::dropIfExists('ijazahs');
    }
}
