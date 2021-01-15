<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomkiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domki')->insert([
            [
                'nazwa_domku' => 'Fioletowa Chatka',
                'cena_za_noc' => 250
            ],
            [
                'nazwa_domku' => 'Dom Hobbita',
                'cena_za_noc' => 100
            ],
            [
                'nazwa_domku' => 'Leśny Szałas',
                'cena_za_noc' => 150
            ]
        ]);
    }
}