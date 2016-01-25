<?php

get('test/batch', function () {
    return implode(", ", range(1, 51));
    /*$index = 1;
    foreach ( range(1, \App\Product::count()) as $id ) {
        if ( $index > 31 ) {
            $index = 1;
        }
        $product = \App\Product::find($id);
        $product->batch_route_id = $index;
        $product->save();
        ++$index;
    }

    return 'done';*/
});


Route::group([ 'middleware' => [ 'auth' ] ], function () {
    get('/', 'HomeController@index');
    get('logout', 'AuthenticationController@getLogout');

    resource('customers', 'CustomerController');

    resource('users', 'UserController');

    resource('products', 'ProductController');

    get('orders/details/{order_id}', 'OrderController@details');
    get('orders/add', 'OrderController@getAddOrder');
    post('orders/add', 'OrderController@postAddOrder');
    get('orders/list', 'OrderController@getList');
    get('orders/search', 'OrderController@search');

    get('items/batch', 'ItemController@getBatch');
    post('items/batch', 'ItemController@postBatch');
    get('items/grouped', 'ItemController@getGroupedBatch');
    resource('items', 'ItemController');

    resource('orders', 'OrderController');
    resource('stations', 'StationController');
    resource('categories', 'CategoryController');
    resource('batch_routes', 'BatchRouteController');
});

Route::group([ 'middleware' => [ 'guest' ] ], function () {
    get('login', 'AuthenticationController@getLogin');
    post('login', 'AuthenticationController@postLogin');
    post('hook', 'OrderController@hook');
});

// Redefinition of routes
get('home', function () {
    return redirect(url('/'));
});
Route::group([ 'prefix' => 'auth' ], function () {
    get('login', 'AuthenticationController@getLogin');
    get('logout', 'AuthenticationController@getLogout');
});

Event::listen('illuminate.query', function($q){
    Log::info($q);
});