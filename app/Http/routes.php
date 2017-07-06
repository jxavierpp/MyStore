<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/supplier/{id?}', 'SupplierController@index');
Route::post('/api/supplier', 'SupplierController@store');
Route::post('/api/supplier/{id}', 'SupplierController@update');
Route::delete('/api/supplier/{id}', 'SupplierController@destroy');

Route::get('/api/category/{id?}', 'categoryController@index');
Route::post('/api/category', 'categoryController@store');
Route::post('/api/category/{id}', 'categoryController@update');
Route::delete('/api/category/{id}', 'categoryController@destroy');

Route::get('/api/product/{id?}', 'productController@index');
Route::post('/api/product', 'productController@store');
Route::post('/api/product/{id}', 'productController@update');
Route::delete('/api/product/{id}', 'productController@destroy');
