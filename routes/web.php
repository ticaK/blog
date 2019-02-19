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

 Route::resource('posts','PostsController');

 Route::delete('posts/{id}/delete','PostsController@destroy')->name('posts-destroy');

 Route::post('posts/{id}/comments','PostsController@addComment')
 ->name('posts.comment');
 

//  Route::get('/register',['as'=>'show-register','uses'=>'RegisterController@create']);
//  Route::post('/register',['as'=>'register','uses'=>'RegisterController@store']);
//  Route::get('/login','LoginController@create')->name('show-login'); 
//  Route::post('/login','LoginController@store')->name('login'); //ovo samo zakomentarisali jer smo ga ubacili u middleware

 Route::get ('/logout','LoginController@logout')->name('logout');

 Route::group(['middleware'=>['guest']],function(){
    Route::get('/register',['as'=>'show-register','uses'=>'RegisterController@create']);

    Route::post('/register','RegisterController@store')->name('register')->
    middleware('age');
   
    Route::get('/login','LoginController@create')->name('show-login'); 
    Route::post('/login','LoginController@store')->name('login');
   
 });
 
//ovo je za izlistavanje svih postova od datog korisnika, kada odemo na /my-posts
Route::group(['middleware'=>['auth']], function(){
    Route::get('/my-posts','UserPostsController@index')->name('my-posts');
});



