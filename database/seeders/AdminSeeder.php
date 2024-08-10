<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admin')->insert([
            [
                'username' => '123',
                'password' => Hash::make('123'),
                'roles' => 'MASTER',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => '1234',
                'password' => Hash::make('1234'),
                'roles' => 'LEMBAGA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
