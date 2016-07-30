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
Route::get('/', 'PostController@blog');
Route::get('blog/{slug}', ['as'=>'blog.single', 'uses' => 'BlogController@getSingle'])
->where('slug', '[\w\d\-\_]+');
Route::resource('post','PostController');

//Categorias
Route::resource('category','CategoryController', ['except' => ['create']]);

//Etiquetas
Route::resource('tag', 'TagController', ['except' => ['create']]);

//Comentarios
Route::resource('comment', 'CommentController');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::get('prueba', function() {
  return view ('layouts.backend');
});
