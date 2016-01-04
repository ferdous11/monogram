<?php

get('test', function(){
    dd(config('app.debug'));
});
get('/', 'HomeController@index');

Route::group(['middleware' => ['auth']], function(){
    get('logout', 'AuthenticationController@getLogout');
    resource('customers', 'CustomerController');
    resource('users', 'UserController');
    resource('products', 'ProductController');
});

Route::group(['middleware' => ['guest']], function(){
    get('login', 'AuthenticationController@getLogin');
    post('login', 'AuthenticationController@postLogin');
});

// Redefinition of routes
get('home', function(){
    return redirect(url('/'));
});