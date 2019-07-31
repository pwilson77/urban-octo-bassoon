<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user_id =  auth()->user()->id;
        $bookings = Booking::where('user_id', $user_id)->orderBy('created_at','desc')->paginate(10);
        return view('Bookings.index')->with('bookings',$bookings);
    }
}
