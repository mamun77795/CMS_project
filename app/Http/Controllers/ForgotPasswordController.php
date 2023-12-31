<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForm(){
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request){
        $this->validate($request, ['email'=>'required|email']);
        $user = User::where('email', $request->email)->first();

        if(!$user){
            $error = "Email not found";
            return view('auth.forgot-password', compact('error'));
        }

        $token = Str::random(64);
        $user->update(['reset_token'=>$token]);
        
        Mail::to($user->email)->send(new ResetPasswordMail($user));
        $message = "Reset link has been sent to your email";
        return view('auth.forgot-password', compact('message'));
    }
}
