<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        $id_category = DB::table('categories')->pluck('id')->toArray();

        $books = [
            [
                'title' => 'The Russian',
                'description' => 'lorem ipsum',
                'author' => $faker->name,
                'publisher' => $faker->company,
                'abstract' => 'lorem ipsum',
                'isbn' => '494993949',
                'quantity' => $faker->numberBetween(1, 5),
                'category_id' => $faker->randomElement($id_category),
            ],
            // [
            //     'title' => 'Si Anak Kancil Nakal',
            //     'description' => $faker->sentence,
            //     'author' => $faker->name,
            //     'publisher' => $faker->company,
            //     'abstract' => $faker->paragraph,
            //     'ISBN' => $faker->isbn13,
            //     'quantity' => $faker->numberBetween(1, 5),
            //     'category_id' => $faker->randomElement($id_category),
            // ],
            // [
            //     'title' => 'Sukses Before 30 Menit',
            //     'description' => $faker->sentence,
            //     'author' => $faker->name,
            //     'publisher' => $faker->company,
            //     'abstract' => $faker->paragraph,
            //     'ISBN' => $faker->isbn13,
            //     'quantity' => $faker->numberBetween(1, 5),
            //     'category_id' => $faker->randomElement($id_category),
            // ],
            // [
            //     'title' => 'Azab Anak Sering Main Tiktok',
            //     'description' => $faker->sentence,
            //     'author' => $faker->name,
            //     'publisher' => $faker->company,
            //     'abstract' => $faker->paragraph,
            //     'ISBN' => $faker->isbn13,
            //     'quantity' => $faker->numberBetween(1, 5),
            //     'category_id' => $faker->randomElement($id_category),
            // ],
            // [
            //     'title' => 'Jejak Gundul Si Petualang',
            //     'description' => $faker->sentence,
            //     'author' => $faker->name,
            //     'publisher' => $faker->company,
            //     'abstract' => $faker->paragraph,
            //     'ISBN' => $faker->isbn13,
            //     'quantity' => $faker->numberBetween(1, 5),
            //     'category_id' => $faker->randomElement($id_category),
            // ],
        ];

        DB::table('books')->insert($books);
    }
}
