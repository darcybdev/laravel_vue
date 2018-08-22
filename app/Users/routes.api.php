<?php

// This is a workaround for now, for using resource
// inside a group
Route::resource('', 'UsersController')->parameters([
    '' => 'id'
]);
