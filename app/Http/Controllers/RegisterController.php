<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Mail; 
use Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('admin/register');
    }
    
    public function actionregister(Request $request)
    {
             $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

         $user = $request->all();
         $createUser = $this->create($user);
         $token = Str::random(64);
  
        UserVerify::create([
              'user_id' => $createUser->id, 
              'token' => $token
            ]);
  
        Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Email Verification Mail');
          });

        return redirect()->route('login')->with('success', 'Registration success. Please check your email to verify!');
    }

     public function create(array $user)
    {
     return User::create([
        'name' => $user['name'],
        'email' => $user['email'],
        'password' => Hash::make($user['password'])
        ]);
    }

     public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('message', $message);
    }
}
