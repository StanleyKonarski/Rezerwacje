<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //kalkulacja zarobkow na aktualny miesiac
        $date = Carbon::now();
        $date->toDateTimeString();
        $date->toDateString();
        $first = $date->firstOfMonth();
        $last = $date->lastOfMonth();
        $first->toDateTimeString();
        $first->toDateString();
        $last->toDateTimeString();
        $last->toDateString();
        $naleznosci = DB::table('reservations')
                        ->where('from', '<=', $first)
                        ->where('to', '<=', $last)
                        ->sum('naleznosc');
        
        //wyciagniecie trzech najbliższych rezerwacji
        $date = Carbon::now();
        $date->toDateTimeString();
        $date->toDateString();
        //wyciagniecie trzech najbliższych rezerwacji
                            $reservations = DB::table('reservations')
                            ->join('domki', 'reservations.domek_id', '=', 'domki.domek_id')
                            ->where('from', '>=', $date)
                            ->orderBy('from')
                            ->limit(3)
                            ->get();
        return view('home',['naleznosci'=>$naleznosci],['reservations'=>$reservations]);
    }
}
