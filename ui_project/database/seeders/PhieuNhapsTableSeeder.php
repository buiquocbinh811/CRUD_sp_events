<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PhieuNhapsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('phieu_nhaps')->insert([
                'TenNCC' => $faker->company,
                'NgayNhap' => $faker->dateTimeBetween('-1 year', 'now'),
                'TongGiaTri' => $faker->numberBetween(1000000, 10000000),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}