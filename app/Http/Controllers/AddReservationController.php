<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;

class AddReservationController extends Controller
{
    function addReservation(Request $req){
        $date = Carbon::now();
        $date->toDateTimeString();
        $date->toDateString();
        $from = $req->from;
        //sprawdzenie czy poczatek rezerwacji jest w przyszłości
        $result = $date->gt($from);
        if($result){
            return redirect()->back() ->withInput()->withErrors(['from_past' => 'Rezerwacja musi zaczynać się w przyszłości.']);
        }
        //sprawdzenie czy koniec jest po początku
        $to = $req->to;
        $to = Carbon::parse($to);
        $result = $to->gt($from);
        if(!$result){
            return redirect()->back() ->withInput()->withErrors(['to_future' => 'Koniec rezerwacji musi następować po początku.']);
        }
        $reservation = new Reservation;
        $reservation->from=$from;
        $reservation->to=$to;
        $reservation->user_id=2;
        $reservation->save();
        return redirect()->back()->with('message', 'Pomyślnie dokonano rezerwacji !');
    }
}
