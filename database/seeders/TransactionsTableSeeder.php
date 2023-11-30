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
                'returned_date' => null,
                'status' => 'borrowed',
                'quantity' => $faker->numberBetween(1, 3),
                'borrow_days' => 7,
                'due_date' => now()->addDays(7),
                'returned' => false,
            ],
            [
                'user_id' => $faker->randomElement($user_ids),
                'book_id' => $faker->randomElement($book_ids),
                'borrowed_date' => $faker->date,
                'returned_date' => now()->addDays(4),
                'status' => 'returned',
                'quantity' => $faker->numberBetween(1, 3),
                'borrow_days' => 4,
                'due_date' => now()->addDays(4),
                'returned' => true,
            ],
            [
                'user_id' => $faker->randomElement($user_ids),
                'book_id' => $faker->randomElement($book_ids),
                'borrowed_date' => $faker->date,
                'returned_date' => null,
                'status' => 'borrowed',
                'quantity' => $faker->numberBetween(1, 3),
                'borrow_days' => 3,
                'due_date' => now()->addDays(3),
                'returned' => false,
            ],
            // Add more transactions as needed
        ];

        DB::table('transactions')->insert($transactions);
    }
}
