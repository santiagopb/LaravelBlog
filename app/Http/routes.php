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
//Patron
Route::pattern('slug', '[\w\d\-\_]+');

//Post
Route::resource('post', 'PostController');

//Paginas
Route::resource('page', 'PageController');

//Categorias
Route::resource('category','CategoryController', ['except' => ['create']]);

//Etiquetas
Route::resource('tag', 'TagController', ['except' => ['create']]);

//Comentarios
Route::resource('comment', 'CommentController');

//Menu
Route::resource('menu', 'MenuController');

//Usuarios
Route::resource('user', 'UserController');

Route::auth();

//Route::get('/home', 'HomeController@index');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::get('/', 'SiteController@blog');
Route::get('/typelogin', 'SiteController@typelogin');
Route::get('blog/{slug}', ['as'=>'blog.single', 'uses' => 'SiteController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('/dashboard', 'SiteController@dashboard');
Route::get('/{slug}', 'SiteController@page'); //DEBE SER EL ULTIMO
