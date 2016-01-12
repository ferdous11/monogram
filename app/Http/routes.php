<?php

get('test', function(){
    dd(config('app.debug'));
});


Route::group(['middleware' => ['auth']], function(){
    get('/', 'HomeController@index');
    get('logout', 'AuthenticationController@getLogout');
    resource('customers', 'CustomerController');
    resource('users', 'UserController');
    resource('products', 'ProductController');
    get('orders/list', 'OrderController@getList');
    get('orders/search', 'OrderController@search');
    resource('orders', 'OrderController');
    resource('stations', 'StationController');
    resource('categories', 'CategoryController');
    resource('batch_routes', 'BatchRouteController');
});

Route::group(['middleware' => ['guest']], function(){
    get('login', 'AuthenticationController@getLogin');
    post('login', 'AuthenticationController@postLogin');
});

// Redefinition of routes
get('home', function(){
    return redirect(url('/'));
});
Route::group(['prefix' => 'auth'], function(){
    get('login', 'AuthenticationController@getLogin');
    get('logout', 'AuthenticationController@getLogout');
});