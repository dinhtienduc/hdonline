<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Hash;
use Auth;
use DateTime;

class UserController extends Controller
{
    public function getList(){
   		$user = User::select('id','username','level','email')->orderBy('id','DESC')->get()->toArray();
   		return view('admin.user.list',compact('user'));
   	}

   	public function getAdd(){
   		return view('admin.user.add');
   	}

   	public function postAdd(UserRequest $request){
   		$user = new User();
   		$user->username 		    =	$request->txtUserName;
   		$user->password 		    =	Hash::make($request->txtPassword);
   		$user->level 			    =	$request->rdoLevel;
         $user->email             = $request->txtEmail;
   		$user->remember_token	 =	$request->_token;
   		$user->save();
   		return redirect()->route('admin.user.getList')->with(['flash_level'=>'success','flash_message'=>'Succes !! Complete Add User']);
   	}

   	public function getDelete($id){
   		$user_current_login = Auth::user()->id;
   		$user = User::find($id);
   		if (($id == 1) || ($user_current_login != 1 && $user["level"] == 1)) {
   			return redirect()->route('admin.user.getList')->with(['flash_level'=>'danger','flash_message'=>'Sorry !! You Can Not Access Delete User']);
   		}else{
   			$user->delete($id);
   			return redirect()->route('admin.user.getList')->with(['flash_level'=>'success','flash_message'=>'Succes !! Complete Delete User']);
   		}
   	}

   	public function getEdit($id){
   		$data = User::find($id);
   		if ((Auth::user()->id != 1) && ($id == 1 || ($data["level"] == 1 && (Auth::user()->id != $id)))) {
   			return redirect()->route('admin.user.getList')->with(['flash_level'=>'danger','flash_message'=>'Sorry !! You Can Not Access Edit  This User']);
   		}
   		return view('admin.user.edit',compact('data','id'));
   	}

   	public function postEdit($id,Request $request){
   		$user = User::find($id);
   		if ($request->input('txtPassword')) {
   			$this->validate($request,[
   					'txtRePassword' => 'same:txtPassword',
                  'txtEmail'      => 'required',
                  'txtEmail'      => 'email',
                  'txtEmail'      => 'unique:tb_users,email'
   				],[
   					'txtRePassword.same' => 'Tow Password Do Not Match',
                  'txtEmail.required'  => 'Please Enter Your Email ',
                  'txtEmail.email'     => 'You Enter Not Email',
                  'txtEmail.unique'    => 'Email Is Exists'
   				]);
   			$pass 			   = $request->input('txtPassword');
   			$user->password   = Hash::make($pass);
   		}
         $this->validate($request,[
                  'txtEmail'      => 'required|email|unique:tb_users,email',
               ],[
                  'txtEmail.required'  => 'Please Enter Your Email ',
                  'txtEmail.email'     => 'You Enter Not Email',
                  'txtEmail.unique'    => 'Email Is Exists'
               ]);
   		$user->level 			= $request ->rdoLevel;
         $user->email         = $request ->txtEmail;
   		$user->updated_at		= new DateTime;
   		$user->remember_token= $request ->input('_token');
   		$user->save();
   		return redirect()->route('admin.user.getList')->with(['flash_level'=>'success','flash_message'=>'Succes !! Complete Edit User']);
   	}
}
