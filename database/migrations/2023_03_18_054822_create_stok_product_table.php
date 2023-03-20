<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_product', function (Blueprint $table) {
            $table->bigIncrements('id_stok_produk');
            $table->integer('id_produk');
            $table->date('tgl');
            $table->string('no_nota')->nullable();
            $table->double('debit');
            $table->double('kredit');
            $table->enum('penyesuaian', ['T', 'Y']);
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
        Schema::dropIfExists('stok_product');
    }
}
