<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;

class Statystyka extends Controller
{
    function index(){
        $year = $date = Carbon::now()->year;
        $stats = array(
            1 => array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
            2 => array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
            3 => array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        );
        $reservations = json_decode(json_encode(DB::table('reservations')
            ->select(DB::raw('count(reservation_id) as count, domek_id, month(reservations.from) as month'))
            ->where(DB::raw('year(reservations.from)'), '=', $year-1)
            ->groupBy('domek_id')
            ->groupBy(DB::raw('month(reservations.from)'))
            ->get()), true);
        foreach ($reservations as $reservation) {
            $stats[$reservation['domek_id']][$reservation['month']-1] = $reservation['count'];
        }
        return view('stats',['stats'=> $stats]);
    }
}
