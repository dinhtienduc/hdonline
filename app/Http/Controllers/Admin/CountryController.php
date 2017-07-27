<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Movies;
use App\Http\Requests\CountryRequest;
use Auth;
use DateTime;

class CountryController extends Controller
{
   	public function getList(){
   		$data = Country::select('id','name','name_seo','information','user_id','url_more')->orderBy('id','DESC')->get()->toArray();
   		return view('admin.country.list',compact('data'));
   	}

   	public function getAdd(){
      $parent = Country::select('id','name','parent_id')->get()->toArray();
   		return view('admin.country.add',compact('parent'));
   	}

   	public function postAdd(CountryRequest $request){
   		$country = new Country;
   		$country->name 			  = $request->txtName;
    	$country->name_seo		= changeTitle($request->txtNameSEO);
    	$country->information	= $request->txtInfo;
    	$country->url_more		= $request->txtUrl;
      $country->parent_id   = $request->selectCountry;
    	$country->user_id		  = Auth::user()->id;
    	$country->save();
    	return redirect()->route('admin.country.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Add Country ']);
   	}

   	public function getDelete($id){
   		$parent = Movies::where('country_id',$id)->count();
      if ($parent == 'id') {
        $country = Country::find($id);
        $country->delete($id);
        return redirect()->route('admin.country.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Country']);  
      }else{
        return redirect()->route('admin.country.getList')->with(['flash_level'=>'warning','flash_message'=>'You Can Not Delete This Country']);
      }
   	}

   	public function getEdit($id){
   		$data = Country::findOrFail($id)->toArray();
    	$parent = Country::select('id','name','name_seo','information','user_id','url_more','parent_id')
			    	->get()
			    	->toArray();
    	return view('admin.country.edit',compact('parent','data'));
   	}

   	public function postEdit(Request $request,$id){
   		$this->validate($request,
    		["txtName"      => "required",
    		 "txtNameSEO"   => "required",
    		 "txtInfo"      => "required"],
    		["txtName.required"     => "Please Enter Name Country",
    		 "txtNameSEO.required"  => "Please Enter NameSEO Country",
    		 "txtInfo.required"     =>"Please Enter Information Country"]
    	);
    	$country = Country::find($id);
    	$country->name 			  = $request->txtName;
    	$country->name_seo		= changeTitle($request->txtNameSEO);
    	$country->information	= $request->txtInfo;
    	$country->url_more		= $request->txtUrl;
      $country->parent_id   = $request->selectCountry;
    	$country->user_id		  = Auth::user()->id;
    	$country->save();
    	return redirect()->route('admin.country.getList')->with(['flash_level'=>'success','flash_message'=>'Succes !! Complete Edit Country']);
   	}
}
