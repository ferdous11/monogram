<?php

get('/', 'HomeController@index');

Route::group(['middleware' => ['auth']], function(){
    get('logout', 'AuthenticationController@getLogout');
});

Route::group(['middleware' => ['guest']], function(){
    get('login', 'AuthenticationController@getLogin');
    post('login', 'AuthenticationController@postLogin');
});

// Redefinition of routes
get('home', function(){
    return redirect(url('/'));
});