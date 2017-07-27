<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Movies;
use App\Http\Requests\ActorRequest;
use Auth;
use DateTime;
use File;

class ActorController extends Controller
{
   	public function getList(){
   		$data = Actor::select('id','name','information','user_id','url_more','thumb')->orderBy('id','DESC')->get()->toArray();
   		return view('admin.actor.list',compact('data'));
   	}

   	public function getAdd(){
   		return view('admin.actor.add');
   	}

   	public function postAdd(ActorRequest $request){
   		$file              = $request->file('fimages');
   		$actor             = new Actor;
   		$actor->name 			 = $request->txtName;
    	$actor->information= $request->txtInfo;
    	$actor->url_more	 = $request->txtUrl;
      $actor->parent_id  = 0;
    	if (strlen($file)>0) {
    		$file_name = time().'.'.$file->getClientOriginalName();
    		$destinationPath = 'upload/actor/';
    		$file->move($destinationPath,$file_name);
    		$actor->thumb    = $file_name;
    	}
    	$actor->user_id		 = Auth::user()->id;
    	$actor->save();
    	return redirect()->route('admin.actor.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Add Actor ']);
   	}

   	public function getDelete($id){
   		$parent = Movies::where('actor_id',$id)->count();
      if ($parent == 'id') {
        $actor = Actor::find($id);
        File::delete((public_path().'/upload/actor/'.$actor->thumb));
        $actor->delete($id);
        return redirect()->route('admin.actor.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Actor']);  
      }else{
        return redirect()->route('admin.actor.getList')->with(['flash_level'=>'warning','flash_message'=>'You Can Not Delete This Actor']);
      }
   	}

   	public function getEdit($id){
   		$data = Actor::findOrFail($id)->toArray();
    	$parent = Actor::select('id','name','information','user_id','url_more','thumb')
			    	->get()
			    	->toArray();
    	return view('admin.actor.edit',compact('parent','data'));
   	}

   	public function postEdit(Request $request,$id){
   		$this->validate($request,
    		["txtName"   => "required",
    		 "txtInfo"   => "required",
    		 "txtUrl"	   =>	"required"],
    		["txtName.required"   => "Please Enter Name Actor",
    		 "txtInfo.required"   =>"Please Enter Information Actor",
    		 "txtUrl.required"    =>"Please Enter Url Actor"]
    	);
    	$file  = $request->file('fimages');
    	$actor = Actor::find($id);
    	$actor->name 			   = $request->txtName;
    	$actor->information	 = $request->txtInfo;
    	$actor->url_more		 = $request->txtUrl;
    	if (strlen($file)>0) {
    		$fimagesCurrent = $request->fimagesCurrent;
    		if(file_exists(public_path().'/upload/actor/'.$fimagesCurrent)){
    			File::delete(public_path().'/upload/actor'.$fimagesCurrent);
    		}
    		$file_name      = time().'.'.$file->getClientOriginalName();
    		$destinationPath= 'upload/actor/';
    		$file->move($destinationPath,$file_name);
    		$actor->thumb   = $file_name;
    	}
    	$actor->user_id		= Auth::user()->id;
    	$actor->save();
    	return redirect()->route('admin.actor.getList')->with(['flash_level'=>'success','flash_message'=>'Succes !! Complete Edit Actor']);
   	}
}
