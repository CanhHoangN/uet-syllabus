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
Route::get('/language/{lg}','PageController@language')->name('language');
Route::get('/tutorial','PageController@tutorial')->name('tutorial');
//ngoc
Route::get('/','PageController@index');
Auth::routes(['verify' => true]);

Route::get('/login', ['as'=>'login', 'uses'=>'PageController@login']);
Route::post('/login', ['as'=>'login', 'uses'=>'PageController@postlogin']);

Route::get('/register', ['as'=>'register', 'uses'=>'PageController@register']);
Route::post('/register', ['as'=>'register', 'uses'=>'Auth\RegisterController@register']);

Route::get('/level/{idLevel}','PageController@getDescLevel')->name('getDesc');

Route::get('/method/{idTemplate}/{idLevel}','PageController@getMethods');

Route::get('/suggest/{idTemplate}/{idLevel}','PageController@getSuggest');

Route::get('/logout','PageController@logout');

Route::match(['get', 'post'], '/save', 'PageController@save')->name('save')->middleware('verified');

Route::match(['get', 'post'], '/confirmsave', 'PageController@confirmsave');

Route::get('/syllabus', 'PageController@syllabus')->name("syllabus")->middleware('verified');

Route::get('/ajax/content/{id}', 'PageController@content');

Route::match(['get', 'post'], '/check', 'PageController@check');

//liem
Route::match(['get', 'post'], '/admin', 'AdminController@login');

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@checkPassword');
    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');
    //session language
    Route::get('/lg', function(){
        Session::put('lg', 'vi');
        echo "put session language ok!";
        if(Session::has('lg'))
        {
            echo Session::get("lg");
        }
    });
    Route::get('/admin/language/{lg}', 'AdminController@language');
    //new
    Route::match(['get', 'post'], '/admin/descLevels', 'AdminController@descLevels');
    Route::get('/admin/descLevels/edit/{id}', 'AdminController@editDL');
    Route::post('/admin/descLevels/edited/{id}', 'AdminController@editedDL');

    Route::match(['get', 'post'], '/admin/suggest/{idTemplate}', 'AdminController@suggest');
    Route::get('/admin/editSuggest/{idTemp}/{idLV}', 'AdminController@editSG');
    Route::post('/admin/editedSuggest/{idTemp}/{idLV}', 'AdminController@editedSG');

    Route::match(['get', 'post'], '/admin/methods', 'AdminController@methods');
    Route::get('/admin/methods/edit/{id}', 'AdminController@editMT');
    Route::post('/admin/methods/edited/{id}', 'AdminController@editedMT');

    Route::match(['get', 'post'], '/admin/customers', 'AdminController@customers');
    Route::post('/admin/listCustomer', 'AdminController@listCustomer');
    Route::get('/admin/syllabus/{id}', 'AdminController@syllabus');
    Route::get('/admin/syllabus/ajax/content/{id}','AdminController@getContent');
    Route::get('/admin/customer/delete/{id}', 'AdminController@deleteCustomer');
    Route::get('/admin/add/{id}', 'AdminController@addAdmin');
    Route::get('/admin/editUser/{id}', 'AdminController@editUser');
    Route::post('/admin/editedUser/{id}', 'AdminController@editedUser');
    Route::match(['get', 'post'], '/admin/editConstraintLB', 'AdminController@editConstraintLB');
    Route::match(['get', 'post'], '/admin/editedConstraintLB', 'AdminController@editedConstraintLB');


});
Route::get('/admin/logout', 'AdminController@logout');

//  Route::get('/password/reset/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::match(['get','post', 'put'], '/edit', 'PageController@edit');
Route::match(['get','post', 'put'], '/delete', 'PageController@delete');
Route::match(['get','post', 'put'], '/export', 'PageController@export');
