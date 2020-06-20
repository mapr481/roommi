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

Route::group(['middleware' => 'disablepreventback'],function(){
	Auth::routes();
    Route::resource('room', 'RoomController');

Route::get('/logout', 'UserController@logout')->name('logout');
Route::delete('/user/publication/delete/{slug}','UserController@destroypub')->name('PubDelete');
Route::get('/user/publication/edit/{slug}','UserController@editpub')->name('PubEdit');
Route::put('/user/publication/update/{slug}','UserController@updatepub')->name('PubUpdate');
Route::get('/user/publication/show/{slug}', 'UserController@showpub')->name('ShowPub');
Route::get('/user/publication', 'UserController@showbyuser')->name('PubUser');
Route::get('/user/view', 'UserController@show')->name('ShowUser');
Route::get('/user/edit/{id}', 'UserController@edit')->name('UserEdit');
Route::resource('user', 'UserController');


Route::get('/admin/view/list', 'AdminController@publications')->name('Publications');
Route::get('/admin/view/{slug}','AdminController@showpub')->name('ShowPublication');
Route::get('/admin/view/edit/{slug}','AdminController@editpub')->name('EditPublication');
Route::put('/admin/view/update/{slug}','AdminController@updatepub')->name('UpdatePublication');
Route::get('/admin/view/users/{id}', 'AdminController@showbyuser')->name('AdminUser');
Route::get('/admin', 'AdminController@index')->name('Admin');
Route::get('/admin/users', 'AdminController@users')->name('Users');
Route::get('/admin/users/{id}','AdminController@show')->name('ShowUser');
Route::get('/admin/users/edit/{id}','AdminController@edit')->name('EditUser');
Route::put('/admin/users/update/{id}','AdminController@update')->name('UpdateUser');
Route::delete('/admin/users/delete/{id}','AdminController@destroy')->name('DeleteUser');
Route::delete('/admin/view/delete/{slug}','AdminController@destroypub')->name('DeletePublication');
Route::get('/admin/stats', 'AdminController@stats')->name('Stats');
Route::resource('admin', 'AdminController');

    

});


Route::get('/view/user/{id}', 'PublicationController@showByUser')->name('ViewUser');
Route::get('/view/{slug}', 'PublicationController@show')->name('RoomView');
Route::resource('view', 'PublicationController');




