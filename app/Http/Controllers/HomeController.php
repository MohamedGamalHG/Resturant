<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Item;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slider = Slider::all();
        $cat = Category::all();
        $item = Item::all();
        return view('welcome',compact('slider','cat','item'));
    }
}
