<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LibrarysTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) { // Giả sử tạo 10 thư viện
            DB::table('librarys')->insert([
                'name' => $faker->company . ' Library', // Tên thư viện
                'address' => $faker->address, // Địa chỉ
                'contact_number' => $faker->phoneNumber, // Số điện thoại liên hệ
            ]);
        }
    }
}
