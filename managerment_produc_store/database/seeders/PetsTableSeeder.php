<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $ownerIds = DB::table('owners')->pluck('id')->toArray();
        for ($i = 0; $i < 20; $i++) {
            DB::table('pets')->insert([
                'owner_id' => $faker->randomElement($ownerIds),
                'pet_name' => $faker->word,
                'pet_species' => $faker->word,
                'pet_breed' => $faker->word,
                'pet_age' => $faker->numberBetween(1, 100),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
