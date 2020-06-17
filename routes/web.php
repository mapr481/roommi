<?php

use App\Http\Controllers\PublicationController;
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


Route::get('/view/user/{id}', 'PublicationController@showByUser')->name('viewUser');
Route::get('/view/{slug}', 'PublicationController@show')->name('roomView');
Route::resource('view', 'PublicationController');


Route::resource('room', 'RoomController');


Route::delete('/user/publication/delete/{slug}','UserController@destroypub')->name('pubDelete');
Route::get('/user/publication/edit/{slug}','UserController@editpub')->name('pubEdit');
Route::put('/user/publication/update/{slug}','UserController@updatepub')->name('pubUpdate');
Route::get('/user/publication/show/{slug}', 'UserController@showpub')->name('showPub');
Route::get('/user/publication', 'UserController@showbyuser')->name('pubUser');
Route::get('/user/view', 'UserController@show')->name('ShowUser');
Route::get('/user/edit/{id}', 'UserController@edit')->name('userEdit');
Route::resource('user', 'UserController');


Route::get('/admin/view/list', 'AdminController@publications')->name('publications');
Route::get('/admin/view/{slug}','AdminController@showpub')->name('showPublication');
Route::get('/admin/view/edit/{slug}','AdminController@editpub')->name('editPublication');
Route::put('/admin/view/update/{slug}','AdminController@updatepub')->name('updatePublication');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/users', 'AdminController@users')->name('users');
Route::get('/admin/users/{id}','AdminController@show')->name('showUser');
Route::get('/admin/users/edit/{id}','AdminController@edit')->name('editUser');
Route::put('/admin/users/update/{id}','AdminController@update')->name('updateUser');
Route::delete('/admin/users/delete/{id}','AdminController@destroy')->name('deleteUser');
Route::delete('/admin/view/delete/{slug}','AdminController@destroypub')->name('deletePublication');
Route::get('/admin/stats', 'AdminController@stats')->name('stats');
Route::resource('admin', 'AdminController');


