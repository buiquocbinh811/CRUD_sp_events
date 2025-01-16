<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HoaDonsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        for ($i = 0; $i < 20; $i++) {
            DB::table('hoa_dons')->insert([
                'TenKH' => $faker->name,
                'TenNV' => $faker->name,
                'NgayXuat' => $faker->dateTimeBetween('-6 months', 'now'),
                'TongTien' => $faker->numberBetween(50000, 1000000),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}