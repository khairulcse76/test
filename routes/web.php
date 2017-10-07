<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group([
    'prefix' => Config("authorization.route-prefix"),
    'middleware' =>  ['authorize', 'auth']
],
    function() {
        Route::get('/sayhello', 'sayHelloController@index');
        // আমরা যে route গুলো control করতে চাই সেগুলো এখানে লিখব।

        Route::get('/insert-product', 'ProductController@create');

        //Category Routes
        Route::get('/insert-category', 'CategoryController@create');
        Route::post('/category-store', 'CategoryController@store');
        Route::get('/insert-subcategory', 'SubCategoryController@create');
        Route::get('/subcategory-manage', 'SubCategoryController@index');
        Route::post('/sub-category-store', 'SubCategoryController@store');

        //Brand Routes
        Route::post('/brand-store', 'BrandController@store');
        Route::get('/insert-brand', 'BrandController@create');
    });



Route::group([
    'prefix' => Config("authorization.route-prefix"),
    'middleware' => ['web', 'auth']],
    function() {
        Route::group(['middleware' => Config("authorization.middleware")], function() {
            Route::resource('users', 'UsersController', ['except' => [
                'create', 'store', 'show'
            ]]);
            Route::resource('roles', 'RolesController');
            Route::get('/permissions', 'PermissionsController@index');
            Route::post('/permissions', 'PermissionsController@update');
            Route::post('/permissions/getSelectedRoutes', 'PermissionsController@getSelectedRoutes');
        });
        Route::get('/', function () {
            return view('vendor.authorize.welcome');
        });
    });
