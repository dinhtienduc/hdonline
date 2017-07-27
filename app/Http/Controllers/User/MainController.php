<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Movies;
use DB;
use Hash;
use Auth;
use DateTime;

class MainController extends Controller
{
	// index
    public function getIndex(){
    	return view('user.pages.home');
    }
    // genres
    public function Genres($id){
    	$cate = Category::select('name')->where('id',$id)->first()->toArray();
    	$genres =Movies::select('id','title','title_seo','director','thumb','category_id','quality')->where('category_id',$id)->get();
    	return view('user.pages.genres',compact('genres','cate'));
    }
    // country
    public function Country($id){
        $country = Country::select('name')->where('id',$id)->first()->toArray();
        $genres =Movies::select('id','title','title_seo','director','thumb','category_id','quality')->where('country_id',$id)->get();
        return view('user.pages.country',compact('genres','country'));
    }
    //detail movies
    public function getDetail($id){
    	$movies = Db::table('tb_movies')->where('id',$id)->first();
    	return view('user.movies.detail',compact('movies'));
    	//{!! url('detail-movies',[$items->id,$items->title_seo])!!}
    }

}
