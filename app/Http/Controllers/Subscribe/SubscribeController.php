<?php

namespace App\Http\Controllers\Subscribe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class SubscribeController extends Controller {

    //
    
    public function index(){
        
    }
    
    public function orderPost(Request $request) {
        
        $user = User::find(Auth::id());
        $input = $request->all();
        $token = $input['stripeToken'];

        try {
            $user->newSubscription('main',$input['plane'])->create($token, [
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
