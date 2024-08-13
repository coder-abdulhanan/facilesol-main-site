<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($counter = 1; $counter <= 20; $counter++){
            DB::table('services_category')->insert([
                'title' => $counter . fake()->sentence(),
                'details' => $counter . fake()->sentence(),
                'status' => 1
            ]);
        }
    }
}
