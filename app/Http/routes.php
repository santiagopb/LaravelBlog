<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {

    return view('page.welcome');
});*/
Route::pattern('slug', '[\w\d\-\_]+');




Route::get('/dashboard', 'PostController@dashboard');
Route::get('blog/{slug}', ['as'=>'blog.single', 'uses' => 'BlogController@getSingle'])
->where('slug', '[\w\d\-\_]+');
Route::resource('post', 'PostController');
Route::resource('page', 'PageController');

//Categorias
Route::resource('category','CategoryController', ['except' => ['create']]);

//Etiquetas
Route::resource('tag', 'TagController', ['except' => ['create']]);

//Comentarios
Route::resource('comment', 'CommentController');

//menu
Route::resource('menu', 'MenuController');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::get('prueba', function() {
  return view ('layouts.backend');
});


Route::get('/', 'PageController@blog');
Route::get('/{slug}', 'PageController@page');
