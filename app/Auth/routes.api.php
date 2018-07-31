<?php

Route::get('', 'AuthController@getStatus');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
