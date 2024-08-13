<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($counter = 1; $counter <= 20; $counter++){
            DB::table('services')->insert([
                'title' => $counter . fake()->sentence(),
                'details' => $counter . fake()->sentence(),
                'category_id' => fake()->numberBetween(1, 100),
                'original_price' => 99.99,
                'discounted_price' => 89.99,
                'status' => 1
            ]);
        }
    }
}
