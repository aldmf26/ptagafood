<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id_product');
            $table->string('nm_product');
            $table->string('sku');
            $table->integer('id_kategori');
            $table->enum('jenis', ['food', 'drink']);
            $table->boolean('is_active');
            $table->string('image');
            $table->integer('id_lokasi');
            $table->integer('id_station')->nullable();
            $table->enum('monitoring', ['T', 'Y']);
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
        Schema::dropIfExists('products');
    }
}
