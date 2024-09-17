<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'admin',
            'level' => '',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'), // Ganti dengan password yang diinginkan
        ]);
    }
}
