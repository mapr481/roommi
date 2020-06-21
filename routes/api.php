<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'disablepreventback'],function()
{
    
   
    
    
    


    Route::get('user', 'UserController@index');
    Route::get('admin', 'AdminController@index');
    Route::get('room', 'RoomController@index');


});