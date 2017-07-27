<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Requests;
use Mail;

class RequetsController extends Controller
{
    public function getRequest(){
    	return view('user.request.request');
    }
    public function postRequest(Request $request){
    	$this->validate($request,
    		[
    			"name"=> "required",
    			"email"		=> "required|email",
    			"subject"=> "required",
    			"message"=> "required",
    		],
    		[
    			"name.required"=> "Please Enter Full Name",
    			"email.required"=> "Please Enter A Email",
    			"email.email"=> "This Is Not A Email",
    			"subject.required"=> "Please Enter Subject",
    			"message.required"=> "Please Enter Message",
    		]);
    	$requests = new Requests();
    	$requests->name = $request->name;
    	$requests->email = $request->email;
    	$this->email = $request->email;
    	$requests->subject = $request->subject;
    	$requests->message = $request->message;
    	$requests->user_id = 14;
    	var_dump($this->email);
    	$requests->save();
    	Mail::send('user.request.mail',
			array(
					'name'=>$request->name,
					'email'=>$request->email,
					'subject'=>$request->subject,
					'message'=>$request->message,),
			function ($msg){
			$msg->from('luongthedung123@gmail.com');
    		$msg->to($this->email)->subject('Thank you for your request');
    	});

    	return redirect()->back()->with(['flash_level'=>'success','flash_message'=>'Success !! Request Email ']);
    }
}
