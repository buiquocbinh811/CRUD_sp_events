<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('vi_VN');
        
        try {
            for($i = 0; $i < 50; $i++) {
                Course::create([
                    'name' => 'Khóa học ' . $faker->words(3, true),
                    'description' => $faker->paragraph(),
                    'difficulty' => $faker->randomElement(['beginner', 'intermediate', 'advanced']),
                    'price' => $faker->randomFloat(2, 100, 1000),
                    'start_date' => $faker->dateTimeBetween('now', '+6 months')->format('Y-m-d')
                ]);
            }
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}