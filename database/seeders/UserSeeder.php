<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id' => "ce9e7c1c-7756-4696-9ed0-2c1c512be8eb",
                'name' => 'Farhan Rivaldy',
                'email' => "fariv.fariv12@gmail.com",
                'password' => Hash::make("password@123"),
                'avatar' => "https://avatars.githubusercontent.com/u/42530587",
                'created_at' => Carbon::now()
            ],
            [
                'user_id' => "80c5c851-912b-46e2-8244-af7d2d97e1a1",
                'name' => 'Fujikawa Chiai',
                'email' => "fujikawachiai@gmail.com",
                'password' => Hash::make("password@123"),
                'avatar' => "https://avatars.githubusercontent.com/u/43559958",
                'created_at' => Carbon::now()
            ],
    ]);
    }
}
