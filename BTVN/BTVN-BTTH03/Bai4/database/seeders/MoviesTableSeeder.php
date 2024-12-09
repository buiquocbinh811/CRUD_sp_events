<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy danh sách các cinema_id từ bảng cinemas
        $cinemaIds = DB::table('cinemas')->pluck('id');

        for ($i = 0; $i < 100; $i++) { // Tạo 100 phim
            DB::table('movies')->insert([
                'title' => $faker->catchPhrase, // Tên phim ngẫu nhiên
                'director' => $faker->name, // Tên đạo diễn ngẫu nhiên
                'release_date' => $faker->date('Y-m-d', 'now'), // Ngày phát hành ngẫu nhiên
                'duration' => $faker->numberBetween(90, 180), // Thời lượng từ 90 đến 180 phút
                'cinema_id' => $faker->randomElement($cinemaIds), // Random cinema_id từ bảng cinemas
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
