<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function reserve(Request $req)
    {
        if(isset($req) && $req->isMethod('POST')) {
            $this->validate($req, [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'dateandtime' => 'required',
            ]);

            Reservation::create([
                'name' => $req->name,
                'phone' => $req->phone,
                'email' => $req->email,
                'date_and_time' => $req->dateandtime,
                'message' => $req->message,
                'status' => false
            ]);
            Toastr::success('Reservation request sent successfully ,we will confirm you soon',
                'Success',["postionClass"=>"toast-top-center"]);
            return redirect()->back();
        }else
            return redirect()->route('/');
    }
}
