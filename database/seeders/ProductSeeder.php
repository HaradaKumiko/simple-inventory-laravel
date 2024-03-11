<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_id' => "7d2f2e73-9f5b-49fe-b42b-afe3bde21779",
                'user_id' => "ce9e7c1c-7756-4696-9ed0-2c1c512be8eb",
                'name' => 'Monitor Gaming',
                'price' => 3_500_000,
                'total_stock' => 922,
                'created_at' => "2024-01-11 05:06:17"
            ],
            [
                'product_id' => "a6ad6a6c-fc57-4e5f-9c35-7e3d621387c4",
                'user_id' => "ce9e7c1c-7756-4696-9ed0-2c1c512be8eb",
                'name' => 'Keyboard Gaming',
                'price' => 750_000,
                'total_stock' => 265,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => "eca1b8ff-618c-43f3-8218-81bb5dcdaa43",
                'user_id' => "80c5c851-912b-46e2-8244-af7d2d97e1a1",
                'name' => 'Webcam',
                'price' => 450_000,
                'total_stock' => 80,
                'created_at' => Carbon::now()
            ]   
    ]);
    }
}
