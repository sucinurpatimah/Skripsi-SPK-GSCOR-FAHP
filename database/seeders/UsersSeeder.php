<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@gmail.com',
                'role' => 'manager',
                'password' => bcrypt('123456')
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
