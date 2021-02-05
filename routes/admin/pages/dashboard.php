<?php
Route::get('dashboard', 'DashboardController@indexDashboard')->name('dashboard');
Route::post('input-product/{productId?}', 'DashboardController@inputProduct')->name('inputProduct');
Route::get('edit-product/{productId}', 'DashboardController@editProduct');
Route::get('delete-product/{productId}', 'DashboardController@deleteProduct');
Route::post('input-invoice/{invoiceId?}', 'DashboardController@inputInvoice')->name('inputInvoice');
Route::get('edit-invoice/{invoiceId}', 'DashboardController@editInvoice');
Route::get('delete-invoice/{productId}', 'DashboardController@deleteInvoice');