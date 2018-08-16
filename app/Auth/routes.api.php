<?php

Route::get('', 'AuthController@getStatus');
Route::put('confirm', 'AuthController@confirm');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::post('register', 'RegisterController@register');
