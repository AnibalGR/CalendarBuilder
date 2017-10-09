<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Calendar;
use App\Subscription;

class HomeController extends Controller
{
    /**
     * Remove the specified resource from storage
     *
     * @param int $calendar_id
     * @param Request $request
     * @return Response
     */
    
    public function deleteCalendar($calendar_id, Request $request){
        
        $calendar = Calendar::find($calendar_id);
               
        $message = $calendar->name . ' was successfuly removed.';
                
        $calendar->delete();
        
        if($request->ajax()){
            return $message;
        }
        
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        $name = $request->input('name');
        $year = $request->input('year');
        $month = $request->input('month');
        
        $calendar = new Calendar();
        $calendar->user_id = Auth::id();
        $calendar->name = $name;
        $calendar->year = $year;
        $calendar->month = $month;
        $calendar->theme = '0';
        $calendar->content = ' ';
        if($calendar->save()){
        return view('home', ['name' => $name, 'year' => $year, 'month' => $month, 'theme' => '0']);
        }else{
            
        }
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
