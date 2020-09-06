<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $req)
    {
        if(isset($req) && $req->isMethod('POST'))
        {
            $this->validate($req,[
                'name'      =>'required',
                'email'      =>'required|email',
                'subject'      =>'required',
            ]);

            Contact::create([
                'name'      =>$req->name,
                'email'      =>$req->email,
                'subject'      =>$req->subject,
                'message'      =>$req->message,
            ]);

            Toastr::success('Thank\'s you to contact with us ' ,
                'Success',["postionClass"=>"toast-top-center"]);
            return redirect()->back();
        }
        else
            return redirect()->back();
    }
}
