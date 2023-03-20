<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();
        \App\Models\User::create(
            [
                'name' => 'Aldi',
                'username' => 'aldi',
                'password' => bcrypt('Takemor'),
                'id_posisi' => '1',
                'id_lokasi' => '1',
            ],
        );

        \App\Models\Posisi::create(['nm_posisi' => 'Presiden',]);
        \App\Models\Posisi::create(['nm_posisi' => 'Admin',]);

        $this->call(Products::class);
        $this->call(Kategori_productSeeder::class);
        $this->call(stationSeeder::class);
        $this->call(BahanSeeder::class);
    }
}
