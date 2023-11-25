<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $user_ids = DB::table('users')->pluck('id')->toArray();
        $book_ids = DB::table('books')->pluck('id')->toArray();

        $transactions = [
            [
                'user_id' => $faker->randomElement($user_ids),
                'book_id' => $faker->randomElement($book_ids),
                'borrowed_date' => $faker->date,
                'returned_date' => $faker->optional(0.7)->date,
                'status' => $faker->randomElement(['borrowed', 'returned']),
                'quantity' => $faker->numberBetween(1, 3),
            ],
            [
                'user_id' => $faker->randomElement($user_ids),
                'book_id' => $faker->randomElement($book_ids),
                'borrowed_date' => $faker->date,
                'returned_date' => $faker->optional(0.7)->date,
                'status' => $faker->randomElement(['borrowed', 'returned']),
                'quantity' => $faker->numberBetween(1, 3),
            ],
            [
                'user_id' => $faker->randomElement($user_ids),
                'book_id' => $faker->randomElement($book_ids),
                'borrowed_date' => $faker->date,
                'returned_date' => $faker->optional(0.7)->date,
                'status' => $faker->randomElement(['borrowed', 'returned']),
                'quantity' => $faker->numberBetween(1, 3),
            ],
            // Add more transactions as needed
        ];
        
        DB::table('transactions')->insert($transactions);
        
    }
}
