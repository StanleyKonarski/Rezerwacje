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
        echo($logged_user_id);
        $reservations = DB::table('reservations')
                            ->join('users', 'reservations.user_id', '=', 'users.id')
                            ->where('from', '>=', $date)
                            ->where('users.id', '=', $logged_user_id )
                            ->get();
        return view('up_reserv_user',['reservations'=>$reservations]);
     }
     public function destroy($id) {
        $date = Carbon::now();
        $date->toDateTimeString();
        $date->toDateString();
        //pluck zeby wydobyc w arrayu bez {from: "xyz"}
        $reservation_start = DB::table('reservations')
                                ->where('reservation_id', '=', $id)
                                ->pluck('from');
        //obliczenie roznicy dni pomiedzy obecna data a poczatkiem rezerwacji
        $day_difference = $date->diffInDays($reservation_start[0]);
        echo($day_difference);
        //sprawdzenie czy od obecnego momentu a poczatku rezerwacji zostalo mniej niz 3 dni
        if($day_difference <= 3){
            return redirect()->back() ->withInput()->withErrors(['late' => 'Rezerwację można anulować najpóźniej 3 dni przed jej datą startu !']);
        }
        //DB::delete('delete from reservations where reservation_id = ?',[$id]);
    }
}
