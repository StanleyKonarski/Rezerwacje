<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class AddReservationController extends Controller
{
    function addReservation(Request $req){
        //pobranie obecnej daty
        $date = Carbon::now();
        $date->toDateTimeString();
        $date->toDateString();
        //pobranie id aktualnie zalogowanego user'a
        $logged_user_id = Auth::id();
        //zamiana select'a na id
        $chosen_place = $req->place;
        $domek_id = 0;
        //possibly zmienic na id wysylane do frontu
        switch ($chosen_place) {
            case "Fioletowa Chatka":
                $domek_id = 1;
                break;
            case "Dom Hobbita":
                $domek_id = 2;
                break;
            case "Leśny Szałas":
                $domek_id = 3;
                break;
            default:
                return redirect()->back() ->withInput()->withErrors(['invalid_place' => 'Nie istnieje taki domek, przykro nam.']);
        }
        //sprawdzenie czy poczatek rezerwacji jest w przyszłości
        $from = $req->from;
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
        //spraawdzenie czy pokoj jest zajety
        $zajete = DB::table('reservations')
        ->where('from', '<=', $to)
        ->where('to', '>', $from)
        ->where('domek_id','=',$domek_id)
        ->count();
        if($zajete > 0){
            return redirect()->back() ->withInput()->withErrors(['taken' => 'Domek niedostepny w wybranym terminie.']);
        }
         //obliczanie należności
        $from = Carbon::parse($from);
        $price_per_night = DB::table('domki')->select('cena_za_noc')->where('domek_id', $domek_id)->first();
        $price_per_night = $price_per_night->cena_za_noc;
        $day_difference = $from->diffInDays($to);
        $price = $price_per_night * $day_difference;

        //ZAPIS
        $reservation = new Reservation;
        $reservation->from=$from;
        $reservation->to=$to;
        $reservation->user_id=$logged_user_id;
        $reservation->domek_id=$domek_id;
        $reservation->naleznosc=$price;
        $reservation->save();

        //Wiadomosc zwrotna
        $message = 'Pomyślnie dokonano rezerwacji! Należność wynosi:'. " " .$price. " " .'PLN';
        return redirect()->back()->with('message', $message);
    }
}
