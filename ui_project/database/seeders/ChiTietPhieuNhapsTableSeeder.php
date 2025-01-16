<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ChiTietPhieuNhapsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $phieuNhaps = DB::table('phieu_nhaps')->pluck('MaPN');
        $thuocs = DB::table('thuocs')->pluck('MaThuoc');

        foreach($phieuNhaps as $maPN) {
            $thuocCount = rand(1, 5);
            $selectedThuocs = $faker->randomElements($thuocs->toArray(), $thuocCount);
            
            foreach($selectedThuocs as $maThuoc) {
                $soLuong = $faker->numberBetween(10, 100);
                $donGia = $faker->numberBetween(1000, 100000);
                DB::table('chi_tiet_phieu_nhaps')->insert([
                    'MaPN' => $maPN,
                    'MaThuoc' => $maThuoc,
                    'SoLuongNhap' => $soLuong,
                    'DonGiaNhap' => $donGia,
                    'ThanhTien' => $soLuong * $donGia
                ]);
            }
        }
    }
}