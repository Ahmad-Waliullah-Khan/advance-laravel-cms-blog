<?php

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostController');

Route::resource('category', 'CategoryController');
Route::resource('tag', 'TagController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');


Route::resource('pending', 'PendingController');
Route::resource('access', 'AccessController');
Route::post('access/user_role_ajax', 'AccessController@user_role_ajax');

Route::resource('settings', 'SettingsController');

Route::resource('profile', 'UserProfileController');
Route::patch('profile/update',  ['as' => 'users.update', 'uses' => 'UserProfileController@update']);





