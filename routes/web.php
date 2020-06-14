<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
    
    return view('index');
   
});

Auth::routes();


Route::resource('/room', 'RoomController');

Route::get('/user/edit/{id}', 'UserController@edit')->name('userEdit');
Route::resource('user', 'UserController');


Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/users', 'AdminController@users')->name('users');
Route::get('/admin/users/{id}','AdminController@show')->name('showUser');
Route::get('/admin/users/edit/{id}','AdminController@edit')->name('editUser');
Route::put('/admin/users/update/{id}','AdminController@update')->name('updateUser');
Route::delete('/admin/users/delete/{id}','AdminController@destroy')->name('deleteUser');
Route::get('/admin/publications', 'AdminController@publications')->name('publications');
Route::get('/admin/stats', 'AdminController@stats')->name('stats');
Route::resource('admin', 'AdminController');


