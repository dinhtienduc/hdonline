<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\News;
class NewsController extends Controller
{
    public function getList(){
    	$news 	= DB::table('tb_news')
    				->select('id','title','information','shortly','thumb','writer','created_at','viewed')
    				->where('statut','1')->orderBy('id','DESC')->skip(0)->take(10)->get();
    	$panews = DB::table('tb_news')->where('statut','1')->Paginate(5);
    	$upnews = News::select('id','title','information','shortly','thumb','writer','updated_at','viewed')
    				->where('statut','1')->orderBy('updated_at','DESC')->skip(0)->take(15)->get();
    	return view('user.news.list',compact('news','panews','upnews'));
    }
    public function getDetail($id){
    	$news_detail = DB::table('tb_news')->where('id',$id)->first();
    	$upnews = News::select('id','title','information','shortly','thumb','writer','updated_at','viewed')
    				->where('statut','1')->orderBy('updated_at','DESC')->skip(0)->take(15)->get();
    	$renews = News::select('id','title','information','shortly','thumb','writer','created_at','viewed')
    				->where('statut','1')->orderBy('writer','DESC')->skip(0)->take(2)->get();
    	return view('user.news.detail',compact('news_detail','upnews','renews'));
    }
}
