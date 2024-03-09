<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
                'product_id' => Str::uuid(),
                'user_id' => "ce9e7c1c-7756-4696-9ed0-2c1c512be8eb",
                'name' => 'Monitor Gaming',
                'price' => 3_500_000,
                'total_stock' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => Str::uuid(),
                'user_id' => "ce9e7c1c-7756-4696-9ed0-2c1c512be8eb",
                'name' => 'Keyboard Gaming',
                'price' => 750_000,
                'total_stock' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => Str::uuid(),
                'user_id' => "80c5c851-912b-46e2-8244-af7d2d97e1a1",
                'name' => 'Webcam',
                'price' => 450_000,
                'total_stock' => 0,
                'created_at' => Carbon::now()
            ]   
    ]);
    }
}
