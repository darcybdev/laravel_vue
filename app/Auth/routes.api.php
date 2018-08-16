<?php

Route::get('', 'AuthController@getStatus');
Route::put('confirm', 'AuthController@confirm');
Route::post('forgot', 'ForgotPasswordController@sendResetLinkEmail');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::post('register', 'RegisterController@register');
Route::put('reset', 'ResetPasswordController@reset');
Route::get('front-reset', 'ResetPasswordController@none')->name('password.reset');
