<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LaptopsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) { // Tạo 50 laptop
            DB::table('laptops')->insert([
                'brand' => $faker->company,
                'model' => $faker->word . ' ' . $faker->randomNumber(3),
                'specifications' => $faker->randomElement(['i5, 8GB RAM, 256GB SSD', 'i7, 16GB RAM, 512GB SSD', 'i3, 4GB RAM, 128GB SSD']),
                'rental_status' => $faker->boolean,
                'renter_id' => rand(1, 10), // Liên kết ngẫu nhiên đến người thuê
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
