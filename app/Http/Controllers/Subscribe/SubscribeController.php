<?php

namespace App\Http\Controllers\Subscribe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class SubscribeController extends Controller {

    //

    public function index() {
        $user = User::find(1);
        $input = $request->all();
        $token = $input['stripeToken'];

        try {
            $user->subscription($input['plane'])->create($token, [
                'email' => $user->email
            ]);
            return back()->with('success', 'Subscription is completed.');
        } catch (Exception $e) {
            return back()->with('success', $e->getMessage());
        }
    }
    
    
    public function showPaymentForm(){
        
        return view('paymentForm');
        
    }
    
}
