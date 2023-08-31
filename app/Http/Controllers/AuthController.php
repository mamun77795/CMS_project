<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function auth(Request $f){
        $email=$f->email;
        $password=$f->password;     
        
        //$px=DB::getTablePrefix();

       $u=DB::select("select * from users where email='$email'");   
      
       if(count($u)==1 && Hash::check($password, $u[0]->password)){             

          $session_id=session()->getId();  
          
          session(['sess_id'=>$session_id,
                   'sess_user_id'=>$u[0]->id,
                   'sess_user_name' =>$u[0]->name,
                   'sess_email'=>$u[0]->email,
                   'sess_photo'=>$u[0]->photo,
                   'sess_role_id'=>$u[0]->role_id,
                   ]); 
                         
          //return view("test.test_view");
          //return redirect("home");
          return redirect("/home");

      }else{
        return redirect("/");
       //  echo "Username or Password is incorrect";  
      }
    }

    public function logout(){
      session()->forget(['sess_id', 'sess_user_id','sess_user_name','sess_email', 'sess_photo','sess_role_id']);
      session()->flush();
      session()->regenerate();  
      return redirect("/");    
    }
}
