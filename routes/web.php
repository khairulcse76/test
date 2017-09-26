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
