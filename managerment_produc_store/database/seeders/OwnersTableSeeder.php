<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class OwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('owners')->insert([
                'owner_name' => $faker->word,
                'owner_email' => $faker->email,
                'owner_phone' => $faker->numerify('0#########'),
                'owner_address' => $faker->randomElement(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
