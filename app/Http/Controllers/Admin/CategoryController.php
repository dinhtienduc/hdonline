<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
	public function getList(){
		$data = Category::select('id','name','name_seo','name_english','order_by','parent_id')->orderBy('id','DESC')->get()->toArray();
		return view('admin.category.list',compact('data'));
	}
    public function getAdd(){
    	$parent = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.category.add',compact('parent'));
    }
    public function postAdd(CategoryRequest $request){
    	$cate 				= new Category;
    	$cate->name 		= $request->txtCateName;
    	$cate->name_seo		= changeTitle($request->txtNameSEO);
    	$cate->name_english	= $request->txtNameEnglish;
    	$cate->order_by		= $request->txtCateOrder;
    	$cate->parent_id	= $request->selectCate	;
    	$cate->save();
		return redirect()->route('admin.category.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Add Categoty ']);
    }
    public function getDelete($id){
    	$parent = Category::where('parent_id',$id)->count();
    	if ($parent == 0) {
    		$cate = Category::find($id);
	    	$cate->delete($id);
	    	return redirect()->route('admin.category.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Category']);	
    	}else{
    		return redirect()->route('admin.category.getList')->with(['flash_level'=>'warning','flash_message'=>'You Can Not Delete This Category']);
    	}
    }
    public function getEdit($id){
    	$data = Category::findOrFail($id)->toArray();
    	$parent = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.category.edit',compact('data','parent'));
    }

    public function postEdit(Request $request,$id){
    	$this->validate($request,
    		["txtCateName"=> "required"],
    		["txtCateName.required"=> "Please Enter Name Category"]
    	);
    	$cate = Category::find($id);
    	$cate->name 		= $request->txtCateName;
    	$cate->name_seo		= changeTitle($request->txtNameSEO);
    	$cate->name_english	= $request->txtNameEnglish;
    	$cate->order_by		= $request->txtCateOrder;
    	$cate->parent_id	= $request->selectCate;
    	$cate->save();
    	return redirect()->route('admin.category.getList')->with(['flash_level'=>'success','flash_message'=>'Succes !! Complete Edit Category']);
    }

}
