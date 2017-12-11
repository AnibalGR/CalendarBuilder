<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class ProfileController extends Controller
{
    //
    public function show() {
        
        // Determinate if is an auntenticated user
        if (Auth::check()) {
            
            // Show the profile layout
            return view('profile.index');
        } else {
            
            // Redirect to the Home 
            redirect(route('home'));
        }
    }
    
    public function edit(Request $request){
        
        // Get the data sended by user
        $username = $request->username;
        $email = $request->email;
        $newPassword = $request->newPassword;
        $confirmedPassword = $request->confirmNewPassword;
        
        // Variable to store the result of the request
        $message = "";
        
        // Verify and use the username first
        if (strlen($username) == 0) {
            $returnData = array(
                'message' => 'The username can not be empty!',
            );
            return response($returnData, 200);
        }
        
        // Verify and use the email
        if (strlen($email) == 0) {
            $returnData = array(
                'message' => 'The email can not be empty!',
            );
            return response($returnData, 200);
        }
        
        // Validator for email address
        $validator = Validator::make($request->all(), ['email' => 'required|email']);
        
        // Validate te email address
        if ($validator->fails()) {
            $returnData = array(
                'message' => 'You must enter a valid email address!',
            );
            return response($returnData, 200);
        }

        // Search for any user using the email
        $users = User::where('email', $email);
        
        // Verify if the email is in use
        if (count($users) > 0) {

            // Someone is using the email address
            if (Auth::user()->email != $email) {

                // The email is in use by another user
                $returnData = array(
                    'message' => 'The email is already in use by another user.',
                );
                return response($returnData, 200);
            }
        }
        
        // Verify the new passwords if needed
        if (count($newPassword) > 0) {
            // The user wants to change the password
            if (strcmp($newPassword, $confirmedPassword) !== 0) {
                // The email is in use by another user
                $returnData = array(
                    'message' => 'The new password and the confirmation does not match',
                );
                return response($returnData, 200);
            }
        }else{
            $user = User::find(Auth::user()->id);

            $user->name = $username;
            $user->email = $email;
            if ($user->save()) {
                $returnData = array(
                    'message' => 'The changes have been saved successfully!',
                );
                return response($returnData, 200);
            }
        }

        $user = User::find(Auth::user()->id);

        $user->name = $username;
        $user->email = $email;
        $user->password = bcrypt($newPassword);
        
        if($user->save()){
            $returnData = array(
                'message' => 'The changes have been saved successfully!',
            );
            return response($returnData, 200);
        }

    }
}
