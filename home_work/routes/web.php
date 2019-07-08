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
//ngoc
Route::get('/','PageController@index');
Auth::routes();

Route::get('/login', ['as'=>'login', 'uses'=>'PageController@login']);
Route::post('/login', ['as'=>'login', 'uses'=>'PageController@postlogin']);

Route::get('/register', ['as'=>'register', 'uses'=>'PageController@register']);
Route::post('/register', ['as'=>'register', 'uses'=>'PageController@postregister']);

Route::get('/level/{idLevel}','PageController@getDescLevel')->name('getDesc');

Route::get('/method/{idTemplate}/{idLevel}','PageController@getMethods');

Route::get('/suggest/{idTemplate}/{idLevel}','PageController@getSuggest');

Route::get('/logout','PageController@logout');

Route::match(['get', 'post'], '/save', 'PageController@save');

Route::match(['get', 'post'], '/confirmsave', 'PageController@confirmsave');

Route::get('/syllabus', 'PageController@syllabus');

Route::get('/ajax/content/{id}', 'PageController@content');

//liem
Route::match(['get', 'post'], '/admin', 'AdminController@login');

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@checkPassword');
    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');
    
    //new
    Route::match(['get', 'post'], '/admin/descLevels', 'AdminController@descLevels');
    Route::get('/admin/descLevels/edit/{id}', 'AdminController@editDL');
    Route::post('/admin/descLevels/edited/{id}', 'AdminController@editedDL');
  
    Route::match(['get', 'post'], '/admin/suggest/{idTemplate}', 'AdminController@suggest');
    Route::get('/admin/editSuggest/{idTemp}/{idLV}', 'AdminController@editSG');
    Route::post('/admin/editedSuggest/{idTemp}/{idLV}', 'AdminController@editedSG');
});
Route::get('/admin/logout', 'AdminController@logout');
