<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// route group user
Route::group(['prefix'=>'/','namespace'=>'User'],function(){
	// home user
	Route::get('/',['as'=>'index','uses'=>'MainController@getIndex']);
	//signin
	Route::get('signUp',['as'=>'user.login.getSignin','uses'=>'LoginController@getSignUp']);
	Route::post('signUp',['as'=>'user.login.postSignin','uses'=>'LoginController@postSignUp']);
	// login 
	Route::get('login',['as'=>'user.login.getLogin','uses'=>'LoginController@getLogin']);
	Route::post('login',['as'=>'user.login.postLogin','uses'=>'LoginController@postLogin']);
	//logout
	Route::post('logout',['as'=>'user.login.getLogout','uses'=>'LoginController@getLogout']);
	// genres
	Route::get('genres/{id}/{name_seo}',['as'=>'genres','uses'=>'MainController@Genres'])
			->where('id','[0-9]+');
	//country
	// genres
	Route::get('country/{id}/{name_seo}',['as'=>'country','uses'=>'MainController@Country'])
			->where('id','[0-9]+');
	// detail movies
	Route::get('detail-movies/{id}/{title_seo}',['as'=>'detailmovies','uses'=>'MainController@getDetail']);
	// news
	Route::get('news',['as'=>'user.news.getList','uses'=>'NewsController@getList']);
	// detail news
	Route::get('detail-news/{id}/{title}',['as'=>'detailnews','uses'=>'NewsController@getDetail']);
	// full listaz
	Route::get('listaz',['as'=>'user.listaz.getList','uses'=>'ListAZController@getListAZ']);
	// request
	Route::get('request',['as'=>'user.request.getRequest','uses'=>'RequetsController@getRequest']);
	Route::post('request',['as'=>'user.request.postRequest','uses'=>'RequetsController@postRequest']);
});
// end route group user

// route login
Route::get('adminlogin',['as'=>'getLogin','uses'=>'LoginController@getLogin']);
Route::post('adminlogin',['as'=>'postLogin','uses'=>'LoginController@postLogin']);
Route::get('logout',['as'=>'getLogout','uses'=>'LoginController@getLogout']);
//route group admin
Route::group(['middleware'=>'auth'],function(){
	Route::group(['prefix'=>'webadmin','namespace'=>'Admin'],function(){
		Route::get('/',function(){
			return view('admin.dashboard.main');
		});
		//route group user
		Route::group(['prefix'=>'user'],function(){
			Route::get('list',['as'=>'admin.user.getList','uses'=>'UserController@getList']);
			Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
			Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
			Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
			Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
			Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
		});
		//route group category
		Route::group(['prefix'=>'category'],function(){
			Route::get('list',['as'=>'admin.category.getList','uses'=>'CategoryController@getList']);
			Route::get('add',['as'=>'admin.category.getAdd','uses'=>'CategoryController@getAdd']);
			Route::post('add',['as'=>'admin.category.postAdd','uses'=>'CategoryController@postAdd']);
			Route::get('delete/{id}',['as'=>'admin.category.getDelete','uses'=>'CategoryController@getDelete']);
			Route::get('edit/{id}',['as'=>'admin.category.getEdit','uses'=>'CategoryController@getEdit']);
			Route::post('edit/{id}',['as'=>'admin.category.postEdit','uses'=>'CategoryController@postEdit']);
		});
		//route group movies
		Route::group(['prefix'=>'movies'],function(){
			Route::get('list',['as'=>'admin.movies.getList','uses'=>'MoviesController@getList']);
			Route::get('add',['as'=>'admin.movies.getAdd','uses'=>'MoviesController@getAdd']);
			Route::post('add',['as'=>'admin.movies.postAdd','uses'=>'MoviesController@postAdd']);
			Route::get('delete/{id}',['as'=>'admin.movies.getDelete','uses'=>'MoviesController@getDelete']);
			Route::get('edit/{id}',['as'=>'admin.movies.getEdit','uses'=>'MoviesController@getEdit']);
			Route::post('edit/{id}',['as'=>'admin.movies.postEdit','uses'=>'MoviesController@postEdit']);
			//route episode
			Route::get('episodelist/{id}',
				['as'=>'admin.movies.getEpisodeList','uses'=>'MoviesController@getEpisodeList']);
			Route::get('episodeadd/{id}',
				['as'=>'admin.movies.getEpisodeAdd','uses'=>'MoviesController@getEpisodeAdd']);
			Route::post('episodeadd/{id}',
				['as'=>'admin.movies.postEpisodeAdd','uses'=>'MoviesController@postEpisodeAdd']);
			Route::get('episodeedit/{id}',
				['as'=>'admin.movies.getEpisodeEdit','uses'=>'MoviesController@getEpisodeEdit']);
			Route::post('episodeedit/{id}',
				['as'=>'admin.movies.postEpisodeEdit','uses'=>'MoviesController@postEpisodeEdit']);
			Route::get('episodedelete/{id}',
				['as'=>'admin.movies.getEpisodeDelete','uses'=>'MoviesController@getEpisodeDelete']);
			Route::get('getMovie',['as'=>'admin.movies.getMovie','uses'=>'MoviesController@getMovie']);
			Route::post('getMovie',['as'=>'admin.movies.getMovie','uses'=>'MoviesController@getMovie']);
		});
		//route group country
		Route::group(['prefix'=>'country'],function(){
			Route::get('list',['as'=>'admin.country.getList','uses'=>'CountryController@getList']);
			Route::get('add',['as'=>'admin.country.getAdd','uses'=>'CountryController@getAdd']);
			Route::post('add',['as'=>'admin.country.postAdd','uses'=>'CountryController@postAdd']);
			Route::get('delete/{id}',['as'=>'admin.country.getDelete','uses'=>'CountryController@getDelete']);
			Route::get('edit/{id}',['as'=>'admin.country.getEdit','uses'=>'CountryController@getEdit']);
			Route::post('edit/{id}',['as'=>'admin.country.postEdit','uses'=>'CountryController@postEdit']);
		});
		//route group actor
		Route::group(['prefix'=>'actor'],function(){
			Route::get('list',['as'=>'admin.actor.getList','uses'=>'ActorController@getList']);
			Route::get('add',['as'=>'admin.actor.getAdd','uses'=>'ActorController@getAdd']);
			Route::post('add',['as'=>'admin.actor.postAdd','uses'=>'ActorController@postAdd']);
			Route::get('delete/{id}',['as'=>'admin.actor.getDelete','uses'=>'ActorController@getDelete']);
			Route::get('edit/{id}',['as'=>'admin.actor.getEdit','uses'=>'ActorController@getEdit']);
			Route::post('edit/{id}',['as'=>'admin.actor.postEdit','uses'=>'ActorController@postEdit']);
		});
		//route group news
		Route::group(['prefix'=>'news'],function(){
			Route::get('list',['as'=>'admin.news.getList','uses'=>'NewsController@getList']);
			Route::get('add',['as'=>'admin.news.getAdd','uses'=>'NewsController@getAdd']);
			Route::post('add',['as'=>'admin.news.postAdd','uses'=>'NewsController@postAdd']);
			Route::get('delete/{id}',['as'=>'admin.news.getDelete','uses'=>'NewsController@getDelete']);
			Route::get('edit/{id}',['as'=>'admin.news.getEdit','uses'=>'NewsController@getEdit']);
			Route::post('edit/{id}',['as'=>'admin.news.postEdit','uses'=>'NewsController@postEdit']);
		});
	});
});
