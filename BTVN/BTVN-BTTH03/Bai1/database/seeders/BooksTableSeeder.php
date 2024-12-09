<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) { // Giả sử tạo 100 sách
            DB::table('books')->insert([
                'title' => $faker->sentence, // Tên sách
                'author' => $faker->name, // Tác giả
                'publication_year' => $faker->year, // Năm xuất bản
                'genre' => $faker->word, // Thể loại
                'library_id' => rand(1, 10), // Liên kết với ID thư viện (giả sử 10 thư viện)
            ]);
        }
    }
}
