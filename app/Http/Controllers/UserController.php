<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login_get()
    {
        return view('login');
    }
    public  function login_post()
    {
        return request()->all();
    }
}
