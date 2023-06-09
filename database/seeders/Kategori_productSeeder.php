<?php

namespace Database\Seeders;

use App\Models\kategori_product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kategori_productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nm_kategori_product' => 'Ramen',
                'id_lokasi' => '1',
            ],
            [
                'nm_kategori_product' => 'Agemono & Yakimono',
                'id_lokasi' => '1',
            ],
            [
                'nm_kategori_product' => 'Bento',
                'id_lokasi' => '1',
            ],

        ];
        DB::table('kategori_product')->insert($data);
    }
}
