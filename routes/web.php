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

// Route::get('posts', function () {
//     return view('posts/index');
// }); 

// Route::get('posts/{id}', function () {
//     return view('posts.show');
// });
// Route::resource('posts','PostsController');

// Route::get('posts','PostsController@index');
// Route::get('posts/{id}','PostsController@show');

 Route::resource('posts','PostsController');
 Route::post('posts/{id}/comments','PostsController@addComment')
 ->name('posts.comment');

 Route::get('/register',['as'=>'show-register','uses'=>'RegisterController@create']);
 Route::post('/register',['as'=>'register','uses'=>'RegisterController@store']);

 Route::get ('/logout','LoginController@logout')->name('logout');

 Route::get('/login','LoginController@create')->name('show-login'); //prikaz fajla
 Route::post('/login','LoginController@store')->name('login');//loginovanje korisnika

 //nastavak:

 Route::group(['middleware'=>['guest']],function(){
    Route::get('/register',['as'=>'show-register','uses'=>'RegisterController@create']);
    Route::post('/register',['as'=>'register','uses'=>'RegisterController@store']);
   
    Route::get('/login','LoginController@create')->name('show-login'); 
    Route::post('/login','LoginController@store')->name('login');
   

 });
 
//u ovoj niz pored guest moze vise midl
//imenovali smo rutu ovo sa as
//drugi nacin bi bio ono sa name


//ovo je za izlistavanje svih postova od datog korisnika, kada odemo na /my-posts
Route::group(['middleware'=>['auth']], function(){
    Route::get('/my-posts','UserPostsController@index')->name('my-posts');
}

);