<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingLapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_lap', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan')->length(50);
            $table->string('alamat')->length(100);
            $table->string('no_tlpn')->length(12);
            $table->string('web')->length(20);
            $table->string('logo')->length(100);
            $table->string('no_hp')->length(12);
            $table->string('email')->length(50);
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
        Schema::dropIfExists('tbl_setting_lap');
    }
}
