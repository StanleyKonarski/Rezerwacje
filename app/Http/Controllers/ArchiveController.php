<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ArchiveController extends Controller
{
    //pobranie rezerwacji które już się odbyły
    public function index() {
        $date = Carbon::now();
        $date->toDateTimeString();
        $date->toDateString();
        $reservations = DB::table('reservations')
                            ->join('users', 'reservations.user_id', '=', 'users.id')
                            ->join('domki', 'reservations.domek_id', '=', 'domki.domek_id')
                            ->where('from', '<=', $date)
                            ->where('to', '<=', $date)
                            ->orderBy('from')
                            ->get();
        return view('past_reserv_admin',['reservations'=>$reservations]);
     }
}
