<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahanSeeder extends Seeder
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
                'nm_bahan' => 'Saos namban',
                'id_satuan' => '1',
                'id_lokasi' => '1',
                'id_kategori_makanan' => '1',
                'monitoring' => 'Y',
            ],
            [
                'nm_bahan' => 'Saos teryaki',
                'id_satuan' => '1',
                'id_lokasi' => '1',
                'id_kategori_makanan' => '1',
                'monitoring' => 'Y',
            ],
            [
                'nm_bahan' => 'Marinet original',
                'id_satuan' => '1',
                'id_lokasi' => '1',
                'id_kategori_makanan' => '1',
                'monitoring' => 'Y',
            ],

        ];
        DB::table('bahan')->insert($data);
    }
}
