<?php

namespace Database\Seeders;

use App\Models\kategori_product;
use Illuminate\Database\Seeder;

class Kategori_productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kategori_product::create([
            'nm_kategori_product' => 'Ramen',
            'id_lokasi' => '1',
        ]);
    }
}
