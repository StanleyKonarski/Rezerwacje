<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;

class AddReservationController extends Controller
{
    function addReservation(Request $req){
        $reservation = new Reservation;
        $reservation->from=$req->from;
        $reservation->to=$req->to;
        $reservation->user_id=2;
        //$reservation->updated_at=Carbon::now();
        //$reservation->created_at=Carbon::now();
        $reservation->save();
    }
}
