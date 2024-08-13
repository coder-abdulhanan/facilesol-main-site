<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($counter = 1; $counter <= 20; $counter++){
            DB::table('faqs')->insert([
                'question' => $counter . fake()->sentence(),
                'answer' => $counter . fake()->sentence(),
                'status' => 1
            ]);
        }
    }
}
