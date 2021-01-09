<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class UserUpcomingReservationsController extends Controller
{
    //pobranie nadchodzacych rezerwacji dla klienta
    public function index() {
        //pobranie aktualnej daty
        $date = Carbon::now();
        $date->toDateTimeString();
        $date->toDateString();
        //pobranie id obecnie zalogowanego użytkownika
        $logged_user_id = Auth::id();
        $reservations = DB::table('reservations')
                            ->join('users', 'reservations.user_id', '=', 'users.id')
                            ->join('domki', 'reservations.domek_id', '=', 'domki.domek_id')
                            ->where('from', '>=', $date)
                            ->where('users.id', '=', $logged_user_id )
                            ->orderBy('from')
                            ->get();
        return view('up_reserv_user',['reservations'=>$reservations]);
     }
     public function destroy($id) {
        $date = Carbon::now();
        $date->toDateTimeString();
        $date->toDateString();
        $logged_user_id = Auth::id();
        //pluck zeby wydobyc w arrayu bez {from: "xyz"}
        $reservation_start = DB::table('reservations')
                                ->where('reservation_id', '=', $id)
                                ->pluck('from');
        //obliczenie roznicy dni pomiedzy obecna data a poczatkiem rezerwacji
        $day_difference = $date->diffInDays($reservation_start[0]);
        //sprawdzenie czy rezerwacja nalezy do uzytkownika
        $owner = DB::table('reservations')
                    ->where('reservation_id', '=', $id)
                    ->pluck('user_id');
        if($owner[0] != $logged_user_id){
            return redirect()->back() ->withInput()->withErrors(['not_authorized' => 'Nie masz do tego uprawnień!']);
        }
        //sprawdzenie czy od obecnego momentu a poczatku rezerwacji zostalo mniej niz 3 dni
        if($day_difference <= 3){
            return redirect()->back() ->withInput()->withErrors(['late' => 'Rezerwację można anulować najpóźniej 3 dni przed jej datą startu!']);
        }
        DB::delete('delete from reservations where reservation_id = ?',[$id]);
        return redirect()->back()->with('message', 'Pomyślnie anulowano rezerwację !');
    }
}
