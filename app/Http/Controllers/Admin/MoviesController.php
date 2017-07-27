<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Actor;
use App\Models\Category;
use App\Models\Movies;
use App\Models\Episode;
use App\Models\Trailer;
use App\Http\Requests\MoviesRequest;
use App\Http\Requests\EpisodeRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Auth;
use DateTime;
use File;
use \Input as Input;

class MoviesController extends Controller
{
   	public function getList(){
   		$data = Movies::select('id','title','user_id','director','type','thumb','category_id','country_id','description','url_imdb','total','quality')
   					->orderBy('id','DESC')
   					->get()
   					->toArray();
   		$cate 	= Category::select('id','name','parent_id')->get()->toArray();
   		$actor 	= Actor::select('id','name','information','user_id','url_more','thumb','parent_id')->get()->toArray();
		$country= Country::select('id','name','name_seo','information','user_id','url_more','parent_id')->get()->toArray();
   		return view('admin.movies.list',compact('data','cate','country','actor'));
	}

	public function getAdd(){
		$cate 	= Category::select('id','name','parent_id')->get()->toArray();
		$actor 	= Actor::select('id','name','information','user_id','url_more','thumb','parent_id')->get()->toArray();
		$country= Country::select('id','name','name_seo','information','user_id','url_more','parent_id')->get()->toArray();
		return view('admin.movies.add',compact('cate','actor','country'));
	}

	public function postAdd(MoviesRequest $request){

        $url = $request->fimages;
        $extension = pathinfo($url,PATHINFO_EXTENSION);
        $file_name = time().'.'.str_slug($url).'.'.$extension;
        $file = file_get_contents($url);
        $save = file_put_contents('upload/movies/'.$file_name, $file);
		$movies 				= new Movies;
    	$movies->title 			= $request->txtTitle;
    	$movies->title_seo		= changeTitle($request->txtTitleSEO);
    	$movies->director		= $request->txtDirec;
        $movies->url_imdb       = $request->txtIMDB;
        $movies->imdb_genre     = $request->txtGenre;
        $movies->imdb_year      = $request->txtYear;
        $movies->imdb_runtime   = $request->txtTime;
        $movies->imdb_lang      = $request->txtLang;
        $movies->imdb_ratting   = $request->txtRat;
        $movies->type           = $request->rdoLevel;
        $movies->total          = $request->txtTotal;
        $movies->description    = $request->txtDescrip;
        $movies->quality        = $request->rdoQuality;
        $movies->type_movies    = $request->rdoUpgrade;
        $movies->category_id    = $request->selectCate;
        $movies->actor_id       = $request->selectActor;
        $movies->country_id     = $request->selectCountry;
        if($save){
            $movies->thumb = $file_name;
        }

        // if images in computer, put up $file the first
        //$file = $request->file('fimages'); //need for file in computer
    	// if (strlen($file)>0) {
    	// 	$file_name = time().'.'.$file->getClientOriginalName();
    	// 	$destinationPath = 'upload/movies/';
    	// 	$file->move($destinationPath,$file_name);
    	// 	$movies->thumb = $file_name;
    	// }
    	
    	$movies->user_id		= Auth::user()->id;
    	$movies->save();
    	// episode
		$episode 				= new Episode;
    	$episode->name 			= $request->txtEpisode;
    	$episode->url			= $request->txtEpisodeUrl;
    	$episode->sub_url		= $request->txtSubUrl;
    	$episode->sub_lang		= $request->txtSubLUrl;
    	$episode->movies_id		= $movies->id;
    	$episode->user_id		= Auth::user()->id;
    	$episode->save();
		return redirect()->route('admin.movies.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Add Movies ']);
	}

	public function getDelete($id){
		$parent = Episode::where('movies_id',$id)->count();
        if ($parent == 0) {
            $movies = Movies::find($id);
            File::delete((public_path().'/upload/movies/'.$movies->thumb));
            $movies->delete($id);
            return redirect()->route('admin.movies.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Movies']);    
        }else{
            return redirect()->route('admin.movies.getList')->with(['flash_level'=>'warning','flash_message'=>'You Can Not Delete This Movies']);
        }
	}

	public function getEdit($id){
		$data 	= Movies::findOrFail($id)->toArray();
    	$cate 	= Category::select('id','name','parent_id')->get()->toArray();
   		$actor 	= Actor::select('id','name','information','user_id','url_more','thumb','parent_id')->get()->toArray();
		$country= Country::select('id','name','name_seo','information','user_id','url_more','parent_id')->get()->toArray();
    	return view('admin.movies.edit',compact('data','cate','country','actor'));
	}

	public function postEdit(Request $request,$id){
        $url = $request->fimages;
        $extension = pathinfo($url,PATHINFO_EXTENSION);
        $file_name = time().'.'.str_slug($url).'.'.$extension;
        $file = file_get_contents($url);
        $save = file_put_contents('upload/movies/'.$file_name, $file);

		$this->validate($request,
    		["txtTitle"=> "required"],
    		["txtTitle.required"=> "Please Enter Name Movies"]
    	);
    	$movies = Movies::find($id);
    	$movies->title 			= $request->txtTitle;
    	$movies->title_seo		= changeTitle($request->txtTitleSEO);
    	$movies->director		= $request->txtDirec;
        $movies->url_imdb       = $request->txtIMDB;
        $movies->imdb_genre     = $request->txtGenre;
        $movies->imdb_year      = $request->txtYear;
        $movies->imdb_runtime   = $request->txtTime;
        $movies->imdb_lang      = $request->txtLang;
        $movies->imdb_ratting   = $request->txtRat;
        $movies->total          = $request->txtTotal;
        $movies->description    = $request->txtDescrip;
        $movies->quality        = $request->rdoQuality;
    	if ($url != '') {
    		$fimagesCurrent = $request->fimagesCurrent;
    		if(file_exists(public_path().'/upload/movies/'.$fimagesCurrent)){
    			File::delete(public_path().'/upload/movies'.$fimagesCurrent);
    		}
    		$movies->thumb = $file_name;
    	}else{
            $movies->thumb = $request->fimagesCurrent;
        }
    	$movies->type			= $request->rdoLevel;
    	$movies->category_id	= $request->selectCate;
    	$movies->actor_id		= $request->selectActor;
    	$movies->country_id		= $request->selectCountry;
    	$movies->updated_at		= new DateTime;
    	$movies->user_id		= Auth::user()->id;
    	$movies->save();
    	return redirect()->route('admin.movies.getList')->with(['flash_level'=>'success','flash_message'=>'Succes !! Complete Edit Movies']);	
	}
	// getlist episode
	public function getEpisodeList($id){
		$data 		= Episode::where('movies_id', $id)->get()->toArray();
   		$movies 	= Movies::select('id','title')->get()->toArray();
   		return view('admin.episode.list',compact('data','movies'));
	}

	public function getEpisodeAdd($id){		
		$data 		= Episode::where('movies_id', $id)->get()->toArray();
		$movies 	= Movies::findOrFail($id)->toArray();
   		return view('admin.episode.add',compact('data','movies'));
	}

	public function postEpisodeAdd($id,EpisodeRequest $request){
		$episode 				= new Episode;
		$episode->movies_id		= $id;
    	$episode->name 			= $request->txtEpisode;
    	$episode->url			= $request->txtEpisodeUrl;
    	$episode->sub_url		= $request->txtEpisodeSub;
    	$episode->sub_lang		= $request->txtEpisodeLang;
    	$episode->user_id		= Auth::user()->id;
    	$episode->save();
    	return redirect()->route('admin.movies.getList')->with(['flash_level'=>'success','flash_message'=>'Succes !! Complete Edit Episode']);
	}
	public function getEpisodeEdit($id){
		$data 	= Episode::findOrFail($id)->toArray();
    	return view('admin.episode.edit',compact('data'));
	}

	public function postEpisodeEdit(Request $request,$id){
    	$this->validate($request,
    		["txtEpisode"		=>"required",
    		 "txtEpisodeUrl"	=>"required",
    		 "txtEpisodeSub"	=>"required",
    		 "txtEpisodeLang"	=>"required"
    		],
    		["txtEpisode.required"		=> "Please Enter Name Episode",
    		 "txtEpisodeUrl.required"	=> "Please Enter Url Episode",
    		 "txtEpisodeSub.required"	=> "Please Enter Url Sub Episode",
    		 "txtEpisodeLang.required"	=> "Please Enter Url Lang Episode"
    		]
    	);
    	$episode = Episode::find($id);
    	$episode->name 			= $request->txtEpisode;
    	$episode->url			= $request->txtEpisodeUrl;
    	$episode->sub_url		= $request->txtEpisodeSub;
    	$episode->sub_lang		= $request->txtEpisodeLang;
    	$episode->save();
    	return redirect()->route('admin.movies.getList')->with(['flash_level'=>'success','flash_message'=>'Succes !! Complete Edit Episode']);
    }
    public function getEpisodeDelete($id){
        $episode = Episode::find($id);
        $episode->delete($id);
        return redirect()->route('admin.movies.getList')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Delete Movies']);    
    }

    public function getMovie(Request $request)
    {
        
        if($request->isMethod('post')){
            var_dump($_POST); exit;

            $url = 'http://www.omdbapi.com/?i=tt3896198&apikey=742c37de';
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 2);
            curl_setopt($curl, CURLOPT_URL, $url);
            $result = curl_exec($curl);
            curl_exec($curl);

            echo $result; exit;        }
        
        // client read api
        /*$client = new Client([ //GuzzleHttp\Client
            'header' => ['content_type' => 'application/json', 'Accept' => 'application/json'],
            ]);
        $response = $client->request('POST','http://www.omdbapi.com/?i=tt2568862&apikey=742c37de');
        $data = $response->getBody();
        var_dump($response); exit;
        exit;*/
    }
}
