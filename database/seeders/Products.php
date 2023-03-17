<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'nm_product' => 'Tamago',
            'sku' => '3111',
            'id_kategori' => '1',
            'jenis' => 'food',
            'is_active' => '1',
            'image' => 'takemori.jpg',
            'id_lokasi' => '1',
        ]);
    }
}
