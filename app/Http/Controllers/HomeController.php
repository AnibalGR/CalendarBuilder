<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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
    
    public function getWelcome2() {
        
        $status = '';
        
        if(Auth::check()){
            
            $user = User::find(Auth::id());
            $status = 'No subscrito';

            if ($user->subscribed('main')) {
                $status = 'Si está subscrito';
            }
        }



        return view('welcome2', array('status' => $status));
        
    }
    
    public function showHomePage()
    {   
        $actualUser = Auth::user();
        if($actualUser->status == 1){
            return view('pruebas');
        }
        return view('welcome');
    }
}
