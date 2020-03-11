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

Route::get('/','WelcomeController@index')->name('index');
Route::get('/posts/{id}','WelcomeController@post')->name('singlePost');
Route::get('/category/{id}','WelcomeController@category')->name('singleCategory');
Route::get('/tag/{id}','WelcomeController@tag')->name('singleTag');
Route::get('/contactUs','WelcomeController@contact')->name('contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


route::group(['prefix' => 'admin','middleware'=>['auth','admin']],function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('/categories','categoriesController');

    Route::resource('/tags','TagsController');

    Route::resource('/posts','PostsController');
    route::get('/trashed-posts','PostsController@trashed')->name('trashed.index');
    route::get('/trashed-posts/{id}','PostsController@restore')->name('trashed.restore');

    route::get('/users','UsersController@index')->name('users.index');
    route::post('/users/{user}/make-admin','UsersController@makeAdmin')->name('users.make-admin');
    route::post('/users/{user}/remove-admin','UsersController@removeAdmin')->name('users.remove-admin');
});
route::group(['middleware'=>'auth'],function(){
    route::get('/users/{user}/profile','UsersController@edit')->name('users.edit');
    route::post('/users/{user}/profile','UsersController@update')->name('users.update');
});
