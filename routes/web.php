<?php

use Illuminate\Routing\RouteGroup;

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:10']], function () {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::resource('users', 'UserController');
    Route::resource('customers', 'CustomerController');
    Route::get('send-email', 'CustomerController@test')->name('mail');
});

// Route::group(['prefix' => 'admin'], function () {
//    
// });

Route::get('search/{keyword}', 'MyController@searchCustomer');

Route::get('export', 'Customer@export')->name('export');
Route::get('importExportView', 'Customer@importExportView');
Route::post('import', 'Customer@import')->name('import');

Route::get('send-email', 'ContactController@test');

Route::get('/', function () {
    return view('welcome');
});
