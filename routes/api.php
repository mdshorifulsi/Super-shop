<?php



Route::group(['namespace' => 'App\Http\Controllers\Admin'], function ($router) {

    Route::apiResource('category', 'CategoryController');
    Route::apiResource('brand', 'BrandController');
    Route::apiResource('product', 'ProductController');

    Route::get('/getting/product/{id}', 'PosController@getProduct');
    Route::get('/addtocard/{id}', 'PosController@addtocard');
    Route::get('/cart/product', 'PosController@cartproduct');
    Route::get('/remove/cart/{id}', 'PosController@removeCart');
    Route::get('/increment/{id}', 'PosController@increment');
    Route::get('/decrement/{id}', 'PosController@decrement');

    Route::post('/orderdone', 'OrderController@orderdone');
    Route::get('/allorder', 'OrderController@allorder');
    Route::get('/order_delete/{id}', 'OrderController@order_delete');
    Route::get('/order/details/{id}', 'OrderController@details');
    Route::get('/order/{oid}', 'OrderController@order');

    Route::get('/stock', 'StockController@stock');
    Route::post('/stock/update/{id}', 'StockController@stock_update');

    Route::get('/todaysell', 'OrderController@todaysell');
    Route::get('/todayincome', 'OrderController@todayincome');
    Route::get('/todaydue', 'OrderController@todaydue');
  

});