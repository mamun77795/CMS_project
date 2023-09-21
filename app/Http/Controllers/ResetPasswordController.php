<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetForm($token){
        $user = User::where('reset_token', $token)->first();
        $email = $user->email;

        if(!$user){
            abort(404);
        }
        
        return view('auth.reset-password', ['token' => $token, 'email'=>$email]);
    }

    public function reset(Request $request){
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
        ]);

        
        $user = User::where('email', $request->email)->where('reset_token', $request->token)->first();

        if (!$user) {
            return back()->with('error', 'Invalid email or token.');
        }

        $user->update([
            'password' => Hash::make($request->password),
            'reset_token' => null,
        ]);
    
        return redirect('/')->with('status', 'Password reset successful. You can now log in.');
    }
}
