<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Adventure'],
            ['name' => 'Action'],
            ['name' => 'Fiction'],
            ['name' => 'Non-Fiction'],
            ['name' => 'Romance'],
            ['name' => 'Other'],
        ]);
    }
}
