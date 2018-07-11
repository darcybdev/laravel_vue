<?php

Route::get('', 'AuthController@getStatus');
Route::post('login', 'LoginController@login');
