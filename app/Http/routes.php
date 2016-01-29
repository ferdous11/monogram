<?php

get('test/batch', function () {
	return date('ymd', strtotime('now'));
	#return implode(", ", range(1, 31));
	$index = 1;
	foreach ( range(1, \App\Product::count()) as $id ) {
		if ( $index > 31 ) {
			$index = 1;
		}
		$product = \App\Product::find($id);
		$product->batch_route_id = $index;
		$product->save();
		++$index;
	}

	return 'done';
});

get('set/{id}', function ($id) {
	\Session::put('station_id', $id);

	return redirect(url('stations/my_station'));
});


Route::group([ 'middleware' => [ 'auth' ] ], function () {
	get('/', 'HomeController@index');
	get('logout', 'AuthenticationController@getLogout');

	resource('customers', 'CustomerController');

	resource('users', 'UserController');

	get('products/unassigned', 'ProductController@unassigned');
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


	post('stations/change', 'StationController@change');
	get('stations/status', 'StationController@status');
	get('stations/supervisor', 'StationController@supervisor');
	post('stations/assign_to_station', 'StationController@assign_to_station');
	get('stations/my_station', 'StationController@my_station');
	resource('stations', 'StationController');

	resource('categories', 'CategoryController');

	resource('sub_categories', 'SubCategoryController');

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

Event::listen('illuminate.query', function ($q) {
	Log::info($q);
});