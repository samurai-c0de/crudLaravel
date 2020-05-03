<?php

use App\Siswa;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            Siswa::create([
                'nama_siswa' => $faker->name,
                'kelas' => $faker->numberBetween(10, 12)
            ]);
        }
    }
}
