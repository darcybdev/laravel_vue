<?php

Route::get('', 'AuthController@getStatus');
Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
