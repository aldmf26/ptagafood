<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKaryawanMajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_karyawan_majo', function (Blueprint $table) {
            $table->integerIncrements('id_karyawan');
            $table->string('nm_karyawan');
            $table->string('posisi');
            $table->string('pangkat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_karyawan_majo');
    }
}
