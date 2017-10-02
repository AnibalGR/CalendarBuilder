<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class PlansController extends Controller
{
    //We show the current available plans
    public function index()
    {
        return view('plans.index')->with(['plans' => Plan::get()]);
    }
    
    //Show a specific plan
    public function show(Plan $plan)
    {
        return view('plans.show')->with(['plan' => $plan]);
    }
}
