<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Domek;

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
        $date = Carbon::now();
        $date->toDateTimeString();
        $date->toDateString();
        $last = $date->lastOfMonth();
        $first->toDateTimeString();
        $first->toDateString();
        $last->toDateTimeString();
        $last->toDateString();
        $naleznosci = DB::table('reservations')
                        ->where('from', '>=', $first)
                        ->where('to', '<=', $last)
                        ->sum('naleznosc');
        
        //wyciagniecie trzech najbliższych rezerwacji
        $date = Carbon::now();
        //fajny trick
        //var_dump($date);die;
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
    public function changePrice(Request $req){
        $chosen_place = $req->place;
        $price = $req->price;
        $domek_id = 0;
        if($price < 1){
            return redirect()->back() ->withInput()->withErrors(['negative_price' => 'Musisz podać cenę większą lub równą 1.']);
        }
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
        DB::table('domki')
            ->where('domek_id', $domek_id)
            ->update(['cena_za_noc' => $price]);

        //Wiadomosc zwrotna
        $message = 'Pomyślnie zmieniono cenę!';
        return redirect()->back()->with('message', $message);
    }
}
