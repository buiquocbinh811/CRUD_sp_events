<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('stores')->insert([
                'store_name' => $faker->unique()->company,
                'store_address' => $faker->randomElement(),
                'store_phone' => $faker->numerify('0#########'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
