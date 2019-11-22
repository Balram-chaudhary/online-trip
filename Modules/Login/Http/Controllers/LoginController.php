<?php

namespace Modules\Login\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use Session;
use Crypt;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('users/dashboard');
        }
        $data=array();
         if(isset($_COOKIE['rem_e']) && $_COOKIE['rem_e'] != null && isset($_COOKIE['rem_p']) && $_COOKIE['rem_p'] != null){
        
            $data['u_e'] = $_COOKIE['rem_e'];
        
            $data['u_p'] = Crypt::decrypt($_COOKIE['rem_p']);
           }
        $data['title']="Login Portal";
        return view('login::index',$data);
    }
    public function authenticate(Request $request){
     $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

     if (Auth::attempt([
        'email'     => $request->email, 
        'password'  => $request->password,
     ])) 
     {
        if($request->input('remember_me')=="yes"){
                Session::put('remember_me','yes');
            }
           if(Auth::check()){
             return redirect()->intended('users/dashboard');
           }else{
            Session::flash('error_message', 'You Are not allowed to login please login');
               return redirect('login'); 
           }
           
        }else{

               Session::flash('error_message', 'Invalid Email or Password.');
               return redirect('login'); 
        }

    }
   

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    
}
