<?php

Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
