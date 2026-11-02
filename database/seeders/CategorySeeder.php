<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'categoryname' => 'Soft drink',
                'description' => 'New soft drink',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'categoryname' => 'Thnol Coffee',
                'description' => 'Best seller',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'categoryname' => 'Coconut Cream lette',
                'description' => 'Full in love',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'categoryname' => 'iced latte',
                'description' => 'Fresh milk',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'categoryname' => 'iced Matcha',
                'description' => 'For cute people',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}