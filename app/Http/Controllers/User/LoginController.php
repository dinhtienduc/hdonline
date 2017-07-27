<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\User;
use Hash;
use Auth;
use DateTime;


class LoginController extends Controller
{
    // signin
    public function getSignUp(){
    	return view('user.login.register');
    }
    public function postSignUp(UserRequest $request){
    	$user = new User;
    	$user->username 		 =	$request->txtUserName;
   		$user->password 		 =	Hash::make($request->txtPassword);
   		$user->level 			 =	2;
        $user->email             =	$request->txtEmail;
   		$user->remember_token	 =	$request->_token;
   		$user->save();
   		return redirect()->route('user.login.getLogin')->with(['flash_level'=>'success','flash_message'=>'Succes !! Complete Add User']);
    }
    // login
    public function getLogin(){
    	return view('user.login.login');
    }
    public function postLogin(Request $request){
    	$this->validate($request,
    		["txtUserName"   => "required",
    		 "txtPassword"   => "required|min:3|max:20",
    		],
    		["txtUserName.required"   =>"Please Enter UserName",
    		 "txtPassword.required"   =>"Please Enter PassWord",
    		 "txtPassword.min"		  =>"PassWord Minimum 3 Characters",
    		 "txtPassword.max"		  =>"PassWord Maximum 20 Characters",
    		]
    	);
    	$login =[
    		'username' 	=> $request->txtUserName,
    		'password' 	=> $request->txtPassword,
    	];
    	if (Auth::attempt($login)) {
    		return redirect('/');
    	}else{
    		return redirect()->back();
    	}
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('index');
    }  
}
