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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin'],function(){
	
	Route::group(['prefix'=>'Post'],function(){
		Route::get('list','PostController@index')->name('indexpost');
		Route::get('addget','PostController@create')->middleware('can:create_post')->name('createpost');
		Route::post('addpost','PostController@store')->name('storepost');
		Route::get('getedit/{id}','PostController@edit')->middleware('can:update_post')->name('editpost');
		Route::post('postedit/{id}','PostController@update')->name('updatepost');
		Route::get('postdel/{id}','PostController@destroy')->middleware('can:delete_post')->name('deletepost');
		Route::post('postdels','PostController@dele');
	});
	Route::group(['prefix'=>'Comment'],function(){
		Route::get('list','CommentController@index')->name('indexcomment');
		Route::get('/del/{id}','CommentController@del')->name('dele');
	});
	Route::group(['prefix'=>'Role'],function(){
		Route::get('list',[
			'as'=>'list.role',
			'uses'=>'RoleController@index'
		]);
		Route::get('/addget','RoleController@create')->middleware('can:CRUD_role')->name('createrole');
		Route::post('/addpost','RoleController@store')->name('storerole');
		Route::get('/getedit/{id}','RoleController@edit')->middleware('can:CRUD_role')->name('editrole');
		Route::post('/postedit/{id}','RoleController@update')->name('updaterole');
		Route::get('/postdel/{id}','RoleController@delete')->middleware('can:CRUD_role')->name('deleterole');
	});
	Route::group(['prefix'=>'User'],function(){
		Route::get('list','UserController@index')->name('listuser');
		Route::get('/addget','UserController@create')->middleware('can:update_user')->name('createuser');

		Route::post('/addpost','UserController@store')->name('storeuser');
		Route::get('/getedit/{id}','UserController@edit')->middleware('can:update_user')->name('edituser');
		Route::post('/postedit/{id}','UserController@update')->name('updateuser');
		Route::get('/postdel/{id}','UserController@delete')->middleware('can:update_user')->name('deleteuser');
	});
});
Route::get('/login','LoginController@getlogin')->middleware('CheckLogin')->name('getlogin');
Route::post('/login','LoginController@postlogin')->name('postlogin');
Route::get('/logout','LoginController@getlogout')->name('logout');
Route::get('/trangchu','PagesController@home')->name('homes');
Route::get('/trangchus','PagesController@homes')->name('homess');
Route::get('/details/{id}','PagesController@details')->name('details');
Route::get('/chitiet/{id}','PagesController@chitiet')->name('chitiet');
Route::post('/chitiet/{id}','PagesController@postcomment')->name('postcomment');
Route::get('/metro',function(){
	return view('layouts.metro');
});