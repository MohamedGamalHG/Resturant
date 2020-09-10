<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Notifications\ReservationConfirmed;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index()
    {
        $reserve = Reservation::all();
        return view('admin.reserve.index',compact('reserve'));
    }
    public function status($id)
    {
        $reserve = Reservation::find($id);
        $reserve->update(['status'=>true]);
        Notification::route('mail',$reserve->email)->notify(new ReservationConfirmed());
        Toastr::success('Reservation successfully confirmed','Success',["postionClass"=>"toast-top-center"]);
        return redirect()->back();
    }
    public  function destroy($id)
    {
        Reservation::find($id)->delete();
        return redirect()->back();
    }
}
