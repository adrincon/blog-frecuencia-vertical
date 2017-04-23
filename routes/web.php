<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//  });

//Rutas del Frontend

  Route::get('/', [
    'as'  =>  'front.index',
    'uses'  =>  'FrontController@index'
  ]);

  Route::get('categories/{name}', [
    'uses' => 'FrontController@searchCategory',
    'as'   => 'front.search.category'
  ]);

  Route::get('tags/{name}', [
    'uses' => 'FrontController@searchTag',
    'as'   => 'front.search.tag'
  ]);

  Route::get('articles/{slug}', [
    'uses'  =>  'FrontController@viewArticle',
    'as'    =>  'front.view.article'
  ]);

//Rutas del panel de Administracion
  Route::group(['prefix' => 'admin'], function(){

    Route::get('users/create', [
      'uses'  =>  'UsersController@create',
      'as'    =>  'users.create'
    ]);

  Route::get('index', function () {
  return view('admin/index');
  })->name('admin.index');


Route::group(['middleware'  =>  'admin'], function(){
  Route::resource('users', 'UsersController');
  Route::get('users/{id}/destroy', [
      'uses'  =>  'UsersController@destroy',
      'as'    =>  'users.destroy'
    ]);
});


Route::resource('categories', 'CategoriesController');
Route::get('categories/{id}/destroy', [
    'uses'  =>  'CategoriesController@destroy',
    'as'    =>  'categories.destroy'
  ]);

Route::resource('tags', 'TagsController');
Route::get('tags/{id}/destroy', [
    'uses'  =>  'TagsController@destroy',
    'as'    =>  'tags.destroy'
  ]);

Route::resource('articles', 'ArticlesController');
Route::get('articles/{id}/destroy', [
    'uses'  =>  'ArticlesController@destroy',
    'as'    =>  'articles.destroy'
  ]);

  Route::get('images', [
    'uses'  =>  'ImagesController@index',
    'as'    =>  'images.index'
    ]);
  });


  Auth::routes();
  Route::get('logout',  ['as' => 'logout', 'uses' =>  '\App\Http\Controllers\Auth\LoginController@logout']);
  //Route::get('/admin', 'HomeController@index');


?>
