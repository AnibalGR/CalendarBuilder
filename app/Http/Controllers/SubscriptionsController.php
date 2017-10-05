<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class SubscriptionsController extends Controller
{
    //
    public function store(Request $request)
    {
        // get the plan after submitting the form
        $plan = Plan::findOrFail($request->plan);

        if ($request->user()->subscribedToPlan($plan->braintree_plan, 'main')) {
            return redirect('home')->with('error', 'Unauthorised operation');
        }

        // subscribe the user
        $request->user()->newSubscription('main', $plan->braintree_plan)->create($request->payment_method_nonce);

        // redirect to home after a successful subscription
        return redirect('home')->with('success', 'Subscribed to '.$plan->braintree_plan.' successfully');
    }
}