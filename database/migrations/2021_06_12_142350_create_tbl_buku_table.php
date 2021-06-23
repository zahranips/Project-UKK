<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('noisbn')->length(100);
            $table->string('penulis')->length(100);
            $table->string('penerbit')->length(100);
            $table->integer('tahun')->length(5);
            $table->integer('stok');
            $table->integer('harga_pokok');
            $table->integer('harga_jual');
            $table->integer('ppn');
            $table->integer('diskon');
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
        Schema::dropIfExists('tbl_buku');
    }
}
