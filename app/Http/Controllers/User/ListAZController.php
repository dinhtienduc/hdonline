<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Movies;
use DB;

class ListAZController extends Controller
{
    public function getListAZ(){
    	$movies =Movies::select('id','title','title_seo','director','thumb','category_id','country_id','actor_id','quality')->get();
    	$full0_9 = DB::table('tb_movies')->where('title', 'LIKE','%[0-9]%')->Paginate(10);
    	$first_a = DB::table('tb_movies')->where('title', 'LIKE', 'a%')->Paginate(10);
    	$first_b = DB::table('tb_movies')->where('title', 'LIKE', 'b%')->Paginate(10);
    	$first_c = DB::table('tb_movies')->where('title', 'LIKE', 'c%')->Paginate(10);
    	$first_d = DB::table('tb_movies')->where('title', 'LIKE', 'd%')->Paginate(10);
    	$first_e = DB::table('tb_movies')->where('title', 'LIKE', 'e%')->Paginate(10);
    	$first_f = DB::table('tb_movies')->where('title', 'LIKE', 'f%')->Paginate(10);
    	$first_g = DB::table('tb_movies')->where('title', 'LIKE', 'g%')->Paginate(10);
    	$first_h = DB::table('tb_movies')->where('title', 'LIKE', 'h%')->Paginate(10);
    	$first_i = DB::table('tb_movies')->where('title', 'LIKE', 'i%')->Paginate(10);
    	$first_j = DB::table('tb_movies')->where('title', 'LIKE', 'j%')->Paginate(10);
    	$first_k = DB::table('tb_movies')->where('title', 'LIKE', 'k%')->Paginate(10);
    	$first_l = DB::table('tb_movies')->where('title', 'LIKE', 'l%')->Paginate(10);
    	$first_m = DB::table('tb_movies')->where('title', 'LIKE', 'm%')->Paginate(10);
    	$first_n = DB::table('tb_movies')->where('title', 'LIKE', 'n%')->Paginate(10);
    	$first_o = DB::table('tb_movies')->where('title', 'LIKE', 'o%')->Paginate(10);
    	$first_p = DB::table('tb_movies')->where('title', 'LIKE', 'p%')->Paginate(10);
    	$first_q = DB::table('tb_movies')->where('title', 'LIKE', 'q%')->Paginate(10);
    	$first_r = DB::table('tb_movies')->where('title', 'LIKE', 'r%')->Paginate(10);
    	$first_s = DB::table('tb_movies')->where('title', 'LIKE', 's%')->Paginate(10);
    	$first_t = DB::table('tb_movies')->where('title', 'LIKE', 't%')->Paginate(10);
    	$first_u = DB::table('tb_movies')->where('title', 'LIKE', 'u%')->Paginate(10);
    	$first_v = DB::table('tb_movies')->where('title', 'LIKE', 'v%')->Paginate(10);
    	$first_w = DB::table('tb_movies')->where('title', 'LIKE', 'w%')->Paginate(10);
    	$first_x = DB::table('tb_movies')->where('title', 'LIKE', 'x%')->Paginate(10);
    	$first_y = DB::table('tb_movies')->where('title', 'LIKE', 'y%')->Paginate(10);
    	$first_z = DB::table('tb_movies')->where('title', 'LIKE', 'z%')->Paginate(10);

    	return view('user.flist.list',compact('movies','full0_9','first_a','first_b','first_c','first_d','first_e','first_f','first_g','first_h','first_i','first_j','first_k','first_l','first_m','first_n','first_o','first_p','first_q','first_r','first_s','first_t','first_u','first_v','first_w','first_x','first_y','first_z'));
    }
}
