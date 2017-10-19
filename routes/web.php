<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/image', function () {
    return view('image');
});
Route::get('/user-product-details/{id}', 'ProductController@productDetails');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin/view-admin/{id}', 'AdminController@viewAdmin');


Route::group([
    'prefix' => Config("authorization.route-prefix"),
    'middleware' =>  ['authorize', 'auth']
],
    function() {
        Route::get('/sayhello', 'sayHelloController@index');
        // আমরা যে route গুলো control করতে চাই সেগুলো এখানে লিখব।

        Route::get('/insert-product', 'ProductController@create');
        Route::post('/product-store', 'ProductController@store');
        Route::get('/manage-product', 'ProductController@productManage');

        //Category Routes
        Route::get('/insert-category', 'CategoryController@create');
        Route::post('/category-store', 'CategoryController@store');
        Route::get('/insert-subcategory', 'SubCategoryController@create');
        Route::get('/subcategory-manage', 'SubCategoryController@index');
        Route::post('/sub-category-store', 'SubCategoryController@store');

        //Brand Routes
        Route::post('/brand-store', 'BrandController@store');
        Route::get('/insert-brand', 'BrandController@create');

        //color Routes
        Route::post('/color-store', 'ColorController@store');
        Route::get('/insert-color', 'ColorController@create');
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
