<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetForm($token){
        $user = User::where('reset_token', $token)->first();

        if(!$user){
            abort(404);
        }
        
        return view('auth.reset-password', ['token' => $token]);
    }

    public function reset(Request $request){
        $this->validate($request, [
            'token' => 'required',
            'password' => 'required|confirmed|min:5',
        ]);

        
        $user = User::where('reset_token', $request->token)->first();

        if (!$user) {
            $error = "Token or Email is Invalid";
            return view('auth.reset-password', compact('error'));
        }

        $user->update([
            'password' => Hash::make($request->password),
            'reset_token' => null,
        ]);

        $status = "Password reset successful. You can log in now";
    
        return view('login', compact('status'));
    }
}
