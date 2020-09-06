<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

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
        Toastr::success('Reservation successfully confirmed','Success',["postionClass"=>"toast-top-center"]);
        return redirect()->back();
    }
    public  function destroy($id)
    {
        Reservation::find($id)->delete();
        return redirect()->back();
    }
}
