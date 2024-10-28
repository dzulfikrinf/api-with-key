<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Sekolah;

class SekolahSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');  // Set locale to Indonesian

        for ($i = 0; $i < 10; $i++) {
            Sekolah::create([
                'nama_sekolah' => $faker->company . ' Sekolah',
                'alamat' => $faker->address,
                'kota' => $faker->city,
            ]);
        }
    }
}

