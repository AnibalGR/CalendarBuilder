<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\User;

class SubscriptionsController extends Controller
{
    //
    
    public function index()
    {
        return view('subscriptions.index');
    }
    
    public function cancel(Request $request)
    {
        $request->user()->subscription('main')->cancel();

        return redirect()->back()->with('success', 'You have successfully cancelled your subscription');
    }
    
    public function resume(Request $request)
    {
        $request->user()->subscription('main')->resume();

        return redirect()->back()->with('success', 'You have successfully resumed your subscription');
    }
    
    public function store(Request $request)
    {
        // get the plan after submitting the form
        $plan = Plan::findOrFail($request->plan);

        if (!$request->user()->subscribed('main')) {
            $request->user()->newSubscription('main', $plan->braintree_plan)->create($request->payment_method_nonce);
        } else {
            $request->user()->subscription('main')->swap($plan->braintree_plan);
        }

        // redirect to home after a successful subscription
        return redirect('home')->with('success', 'Subscribed to '.$plan->braintree_plan.' successfully');
    }
}
