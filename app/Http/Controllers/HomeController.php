<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Calendar;
use App\Subscription;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    /**
     * Show the application Main Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHomePage()
    {   
            return view('pruebas');
    }
    
    public function dashboard()
    {   
        $calendars = Calendar::where('user_id', Auth::id())->get();
        $plans = Subscription::where('user_id', Auth::id())->where('ends_at', null)->get();
        
        return view('dash')->with(['calendars' => $calendars, 'plans' => $plans]);
    }
}
