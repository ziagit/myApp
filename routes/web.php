<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home/post/{id}', 'HomeController@show');
Route::get('/home/company/about-us', 'HomeController@getAboutPage');
Route::get('/home/company/contact-us', 'HomeController@getContactPage');

Auth::routes();

Route::get('/user/user-profile', 'AdminController@index');


//comment routes
Route::get('/comments', 'CommentController@index');
Route::post('/create/comment/{post_id}', 'CommentController@store');
Route::post('/update/comment/', 'CommentController@update');
Route::get('/delete/comment/{id}', 'CommentController@destroy');

Route::group(['middleware' => ['auth','isadmin']], function(){

    Route::get('/dashboard', 'AdminController@index');
	//post routes
    Route::get('/posts', 'PostAdminController@index');
    Route::post('/create/post', 'PostAdminController@store');
    Route::post('/update/post', 'PostAdminController@update');
    Route::get('/delete/post/{id}', 'PostAdminController@destroy');
    
    //our-team routes
    Route::get('/team', 'TeamController@index');
    Route::post('/create/team', 'TeamController@store');
    Route::post('/update/team', 'TeamController@update');
    Route::get('/delete/team/{id}', 'TeamController@destroy');

    //our-client routes
    Route::get('/client', 'ClientController@index');
    Route::post('/create/client', 'ClientController@store');
    Route::post('/update/client', 'ClientController@update');
    Route::get('/delete/client/{id}', 'ClientController@destroy');

    //users routes
    Route::get('/user', 'UserController@index');
    Route::post('/create/user', 'UserController@store');
    Route::post('/update/user', 'UserController@update');
    Route::get('/delete/user/{id}', 'UserController@destroy');

});

