<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use Auth;
use DateTime;
use File;
class NewsController extends Controller
{
    public function getList(){
    	$data = News::select('id','title','writer','thumb','information','statut','user_id')->orderBy('id','DESC')->get()->toArray();
   		return view('admin.news.list',compact('data'));
    }
    public function getAdd(){
		return view('admin.news.add');
    }
    public function postAdd(NewsRequest $request){
    	$file              	= $request->file('fimages');
   		$news            	= new News;
   		$news->title 		= $request->txtName;
    	$news->information 	= $request->txtInfo;
    	$news->writer	 	= $request->txtWriter;
        $news->shortly      = $request->txtShort;
    	$news->statut	 	= $request->rdoLevel;
        $news->created_at   = new DateTime;
    	if (strlen($file)>0) {
    		$file_name = time().'.'.$file->getClientOriginalName();
    		$destinationPath = 'upload/news/';
    		$file->move($destinationPath,$file_name);
    		$news->thumb    = $file_name;
    	}
    	$news->user_id		 = Auth::user()->id;
    	$news->save();
    	return redirect()->route('admin.news.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Add News ']);
    }
    public function getEdit($id){
    	$data = News::findOrFail($id)->toArray();
    	return view('admin.news.edit',compact('data'));
    }
    public function postEdit(Request $request,$id){
    	$this->validate($request,
    		["txtName"   => "required",
    		 "txtInfo"   => "required",
    		 "txtWriter" => "required",
             "txtShort" => "required"],
    		["txtName.required"   => "Please Enter Name News",
    		 "txtInfo.required"   =>"Please Enter Information News",
    		 "txtWriter.required" =>"Please Enter Name Writter",
             "txtShort.required"  =>"Please Enter Shortly"]
    	);
    	$file  = $request->file('fimages');
    	$news = News::find($id);
    	$news->title 		 = $request->txtName;
    	$news->information	 = $request->txtInfo;
    	$news->writer	 	 = $request->txtWriter;
        $news->shortly       = $request->txtShort;
    	$news->statut	 	 = $request->rdoLevel;
        $news->updated_at    = new DateTime;
    	if (strlen($file)>0) {
    		$fimagesCurrent = $request->fimagesCurrent;
    		if(file_exists(public_path().'/upload/news/'.$fimagesCurrent)){
    			File::delete(public_path().'/upload/news'.$fimagesCurrent);
    		}
    		$file_name      = time().'.'.$file->getClientOriginalName();
    		$destinationPath= 'upload/news/';
    		$file->move($destinationPath,$file_name);
    		$news->thumb   = $file_name;
    	}
    	$news->user_id		= Auth::user()->id;
    	$news->save();
    	return redirect()->route('admin.news.getList')->with(['flash_level'=>'success','flash_message'=>'Succes !! Complete Edit News']);
    }
    public function getDelete($id){
    	$news = News::find($id);
    	File::delete((public_path().'/upload/news/'.$news->thumb));
        $news->delete($id);
        return redirect()->route('admin.news.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete News']);    
    }
}
