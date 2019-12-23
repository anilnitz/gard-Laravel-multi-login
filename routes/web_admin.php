<?php

Route::namespace('Admin')->prefix('admin')->group(function() {

    Route::get('/', 'HomeController@index')->name('admin.home');

    // Users
    Route::get('/users', 'UserController@index')->name('admin.users.index');

    Route::get('/users/create', 'UserController@create')->name('admin.users.create');
    Route::post('/users/create', 'UserController@postCreate')->name('admin.users.create.post');

    Route::get('/users/edit/{userId}', 'UserController@edit')->name('admin.users.edit');
    Route::post('/users/edit/{userId}', 'UserController@postEdit')->name('admin.users.edit.post');


    Route::namespace('Auth')->group(function() {


        // Authentication Routes
        Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'LoginController@login');


        Route::post('logout', 'LoginController@logout')->name('admin.logout');

        // Registration Routes
        Route::get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('register', 'RegisterController@register');

    });

});