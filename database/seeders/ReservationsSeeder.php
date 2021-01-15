<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            [
                'user_id' => 2,
                'from' => '2020-05-20',
                'to' => '2020-05-27',
                'created_at' => '2020-05-18',
                'domek_id' => 2,
                'naleznosc' => 720
            ],
            [
                'user_id' => 3,
                'from' => '2020-05-28',
                'to' => '2020-05-31',
                'created_at' => '2020-05-27',
                'domek_id' => 3,
                'naleznosc' => 400
            ],
            [
                'user_id' => 2,
                'from' => '2020-06-01',
                'to' => '2020-06-20',
                'created_at' => '2020-05-31',
                'domek_id' => 1,
                'naleznosc' => 2100
            ],
            [
                'user_id' => 3,
                'from' => '2020-06-21',
                'to' => '2020-06-27',
                'created_at' => '2020-06-18',
                'domek_id' => 2,
                'naleznosc' => 350
            ],
            [
                'user_id' => 2,
                'from' => '2020-06-28',
                'to' => '2020-07-03',
                'created_at' => '2020-06-26',
                'domek_id' => 3,
                'naleznosc' => 600
            ],
            [
                'user_id' => 3,
                'from' => '2020-07-05',
                'to' => '2020-07-12',
                'created_at' => '2020-07-04',
                'domek_id' => 1,
                'naleznosc' => 800
            ],
            [
                'user_id' => 2,
                'from' => '2020-07-14',
                'to' => '2020-07-20',
                'created_at' => '2020-07-12',
                'domek_id' => 1,
                'naleznosc' => 770
            ],
            [
                'user_id' => 3,
                'from' => '2020-07-22',
                'to' => '2020-07-27',
                'created_at' => '2020-07-18',
                'domek_id' => 3,
                'naleznosc' => 660
            ],
            [
                'user_id' => 2,
                'from' => '2020-08-01',
                'to' => '2020-08-15',
                'created_at' => '2020-07-29',
                'domek_id' => 2,
                'naleznosc' => 1600
            ],
            [
                'user_id' => 2,
                'from' => '2020-01-01',
                'to' => '2020-01-15',
                'created_at' => '2020-07-29',
                'domek_id' => 2,
                'naleznosc' => 300
            ],
            [
                'user_id' => 2,
                'from' => '2020-01-17',
                'to' => '2020-01-18',
                'created_at' => '2020-07-29',
                'domek_id' => 2,
                'naleznosc' => 200
            ],
            [
                'user_id' => 2,
                'from' => '2020-01-20',
                'to' => '2020-01-21',
                'created_at' => '2020-07-29',
                'domek_id' => 2,
                'naleznosc' => 400
            ],

        ]);
    }
}
