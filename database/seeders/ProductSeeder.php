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
            'name' => 'Monitor Gaming',
            'price' => 3_500_000,
            'total_stock' => 0,
            'created_at' => Carbon::now()
            ],
            [
            'product_id' => Str::uuid(),
            'name' => 'Keyboard Gaming',
            'price' => 750_000,
            'total_stock' => 0,
            'created_at' => Carbon::now()
            ],
            [
            'product_id' => Str::uuid(),
            'name' => 'Webcam',
            'price' => 450_000,
            'total_stock' => 0,
            'created_at' => Carbon::now()
            ]   
    ]);
    }
}
