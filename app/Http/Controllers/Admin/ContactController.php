<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
        public function contact()
        {
            $contact = Contact::all();
            return view('admin.contact.index',compact('contact'));
        }
        public  function show($id)
        {
            $contact = Contact::select('name','message')->find($id);
            return view('admin.contact.show',compact('contact'));
        }
        public function destroy($id)
        {
            Contact::find($id)->delete();
            return redirect()->back();
        }
}
