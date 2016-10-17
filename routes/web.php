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

//Route::get('{locale}', function ($locale) {
//    App::setLocale($locale);
//    return view('index');
//});
Route::match(['get', 'post'], '/', function () {
    //
});


Route::get('/',['as'=>'admin', 'uses'=>'HomeController@index']);
Route::get('home',['as'=>'admin', 'uses'=>'Admin\TestController@homePage']);
Route::get('admin',['as'=>'admin', 'uses'=>'Admin\TestController@index']);

/*page*/
Route::get('admin/create_pages',['as'=>'admin', 'uses'=>'Admin\PageController@create']);
Route::post('admin/create_pages', 'Admin\PageController@create');

// Маршруты аутентификации...
Route::get('login', 'Auth\LoginController@getLogin');
Route::post('login', 'Auth\LoginController@postLogin');
Route::get('logout', 'Auth\LoginController@logout');

// Маршруты регистрации...
Route::get('auth/register', 'Auth\RegisterController@getRegister');
Route::post('auth/register', 'Auth\RegisterController@postRegister');


Auth::routes();

//Route::get('/home', 'HomeController@index');
