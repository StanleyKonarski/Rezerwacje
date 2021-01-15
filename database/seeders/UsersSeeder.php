<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$kdbfU4M2wcnIuBVV2CFLsOAyMjaarkv29oSh2mYN/PzZrr8B692W6',
                'role' => 'admin'
            ],
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'password' => '$2y$10$mlLP.99mcSxKcjqoQW/0IuJpEfTr1/e0occVjMlzj0Atr7xua91FK',
                'role' => 'user'
            ],
            [
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'password' => '$2y$10$mlLP.99mcSxKcjqoQW/0IuJpEfTr1/e0occVjMlzj0Atr7xua91FK',
                'role' => 'user'
            ]
        ]);
    }
}