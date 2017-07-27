<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function getLogin(){
    	if (!Auth::check()) {
    		return view('admin.login.login');
    	}else{
    		return redirect('webadmin');
    	}	
    }

    public function postLogin(LoginRequest $request){
    	$login =[
    		'username' 	=> $request->txtUserName,
    		'password' 	=> $request->txtPassword,
    		'level'		=> 1
    	];
    	if (Auth::attempt($login)) {
    		return redirect('webadmin');
    	}else{
    		return redirect()->back();
    	}
    
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('getLogin');
    }
}
