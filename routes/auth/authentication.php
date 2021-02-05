<?php

Route::get('login', 'AuthenticationController@indexLogin')->name('login');
Route::get('register', 'AuthenticationController@indexRegister')->name('register');
Route::post('create-user', 'AuthenticationController@createUser')->name('createUser');
Route::post('login-auth', 'AuthenticationController@loginAuth')->name('loginAuth');
Route::get('logout-auth', 'AuthenticationController@logoutAuth')->name('logoutAuth');