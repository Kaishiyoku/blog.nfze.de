<?php

Route::get('/', 'ArticleController@index')->name('home');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login_form');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset_form');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');

Route::resource('articles', 'ArticleController');
Route::post('preview', 'ArticleController@preview')->name('articles.preview');