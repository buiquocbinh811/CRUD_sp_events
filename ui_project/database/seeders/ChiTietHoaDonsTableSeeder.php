<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ChiTietHoaDonsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $hoaDons = DB::table('hoa_dons')->pluck('MaHD');
        $thuocs = DB::table('thuocs')->pluck('MaThuoc');

        foreach($hoaDons as $maHD) {
            $thuocCount = rand(1, 5);
            $selectedThuocs = $faker->randomElements($thuocs->toArray(), $thuocCount);
            
            foreach($selectedThuocs as $maThuoc) {
                $soLuong = $faker->numberBetween(1, 10);
                $donGia = $faker->numberBetween(2000, 150000);
                DB::table('chi_tiet_hoa_dons')->insert([
                    'MaHD' => $maHD,
                    'MaThuoc' => $maThuoc,
                    'SoLuong' => $soLuong,
                    'DonGia' => $donGia,
                    'ThanhTien' => $soLuong * $donGia
                ]);
            }
        }
    }
}