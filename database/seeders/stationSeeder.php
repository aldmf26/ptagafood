<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class stationSeeder extends Seeder
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
                'nm_station' => 'Food',
                'id_lokasi' => '1',
            ],
            [
                'nm_station' => 'Drink',
                'id_lokasi' => '1',
            ],
            [
                'nm_station' => 'Sushi',
                'id_lokasi' => '1',
            ],
            [
                'nm_station' => 'Agemono',
                'id_lokasi' => '1',
            ],

        ];
        DB::table('station')->insert($data);
    }
}
