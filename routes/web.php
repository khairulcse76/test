<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/image', function () {
    return view('image');
});
Route::get('/user-product-details/{id}', 'ProductController@productDetails');
Route::get('/checkout/', 'FrontendController@checkout');
Route::get('/cart/', 'FrontendController@cart');
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
        Route::get('/edit-product/{id}', 'ProductController@productedit');
        Route::post('/product-update/{id}', 'ProductController@product_update');
        Route::get('/product-delete/{id}', 'ProductController@product_delete');
        Route::get('/product-trash', 'ProductController@trash');
        Route::get('/product-restore/{id}', 'ProductController@restore');
        Route::get('/force-delete/{id}', 'ProductController@force_delete');

        //Category Routes
        Route::get('/insert-category', 'CategoryController@create');
        Route::get('/manage-category', 'CategoryController@index');
        Route::get('/edit-category/{id}', 'CategoryController@edit');
        Route::post('/category-store', 'CategoryController@store');
        Route::post('/category-update/{id}', 'CategoryController@update');
        Route::get('/delete-cetegory/{id}', 'CategoryController@destroy');
        Route::get('/insert-subcategory', 'SubCategoryController@create');
        Route::get('/subcategory-manage', 'SubCategoryController@index');
        Route::post('/sub-category-store', 'SubCategoryController@store');
        Route::get('/edit-subcategory/{id}', 'SubCategoryController@edit');
        Route::post('/update-subcategory/{id}', 'SubCategoryController@update');
        Route::get('/delete-subcetegory/{id}', 'SubCategoryController@destroy');

        //Brand Routes
        Route::post('/brand-store', 'BrandController@store');
        Route::post('/brand-update/{id}', 'BrandController@update');
        Route::get('/insert-brand', 'BrandController@create');
        Route::get('/manage-brand', 'BrandController@index');
        Route::get('/edit-brand/{id}', 'BrandController@edit');
        Route::get('/delete-brand/{id}', 'BrandController@destroy');

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
