<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use Session;
use Crypt;
use Validator;
class UsersController extends Controller
{
   public function dashboard(){
    if(Auth::check()){
        $data['title']='User Dashboard';
        return view('users::dashboard',$data);
    }
   }
  
}
