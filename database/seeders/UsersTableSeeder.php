<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin2',
            'level' => 'admin',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('12345678'), // Ganti dengan password yang diinginkan
        ]);

        User::create([
            'name' => 'user2',
            'level' => 'user',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('12345678'), // Ganti dengan password yang diinginkan
        ]);
    }
}
