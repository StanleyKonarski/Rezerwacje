<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AdminUpcomingReservationsController extends Controller
{
    //pobranie nadchodzacych rezerwacji wszystkich klientow dla admina
    public function index() {
        $date = Carbon::now();
        $date->toDateTimeString();
        $date->toDateString();
        $role = Auth::user()->role;
        $reservations = DB::table('reservations')
                            ->join('users', 'reservations.user_id', '=', 'users.id')
                            ->join('domki', 'reservations.domek_id', '=', 'domki.domek_id')
                            ->where('from', '>=', $date)
                            ->orderBy('from')
                            ->get();
        return view('up_reserv_admin',['reservations'=>$reservations]);
     }
     //usuniecie dowolnej rezerwacji przez admina
     public function destroy($id) {
         DB::delete('delete from reservations where reservation_id = ?',[$id]);
         return redirect()->back()->with('message', 'Pomyślnie anulowano rezerwację !');
     }
}
