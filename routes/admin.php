<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

Route::prefix('admin')->group(function(){
Config::set('auth.defines','admin');
Route::get('/login','AdminController@login')->name('loginPage');
Route::post('adminlogin','AdminController@dologin')->name('doAdminLogin');
Route::get('forget/password','AdminController@forget')->name('Aviewforget');
Route::get('verfiy/{token}/email','AdminController@verify')->name('Averify');
Route::post('/reset/password/email','AdminController@sendpasswordemail')->name('sendPasswordEmail');
Route::get('new/reset/{admin}/password','AdminController@viewNewReset')->name('newresetpassword');
Route::put('/reset/new/{admin}/password','AdminController@doreset')->name('doAdminPasswordreset');
Route::middleware('admin:admin')->group(function(){

    Route::get('/','AdminController@home')->name('dashboard');
    Route::any('logout','AdminController@logout')->name('logout');
    Route::resource('admins','DashboardController');
    Route::resource('clients','ClientController');
    Route::resource('services','ServiceController');

});

});
// admin@test.com