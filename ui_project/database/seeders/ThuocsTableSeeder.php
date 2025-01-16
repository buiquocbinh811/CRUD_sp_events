<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ThuocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('thuocs')->insert([
                'TenThuoc' => $faker->unique()->word,
                'DonViTinh' => $faker->randomElement(['Viên', 'Hộp', 'Chai', 'Gói']),
                'SoLuongTon' => $faker->numberBetween(10, 1000),
                'DonGiaNhap' => $faker->numberBetween(1000, 100000),
                'DonGiaBan' => $faker->numberBetween(2000, 150000),
                'NgayHetHan' => $faker->dateTimeBetween('+1 month', '+2 years'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
