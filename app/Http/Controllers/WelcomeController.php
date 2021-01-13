<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    //pobranie cen domków
    public function index() {
        //$fioletowa_chatka = DB::table('domki')
        //                    ->where('domek_id', '=', 1)
        //                    ->first();
        //$lesny_szalas = DB::table('domki')
        //                     ->where('domek_id', '=', 3)
        //                    ->first();
        //$dom_hobbita = DB::table('domki')
        //                    ->where('domek_id', '=', 2)
        //                    ->first();
        //return view('welcome',['fiolet'=>$fioletowa_chatka],['dom'=>$dom_hobbita],['szalas'=>$lesny_szalas]);

        $domki = DB::table('domki')
                    ->get();
        return view('welcome',['domki'=>$domki]);
     }
}
