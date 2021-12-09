<?php

use Illuminate\Http\Request;
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
Route::get('show_requests_list/{user}', 'RequestController@show_requests_list');
Route::get('show_request/{item}', 'RequestController@show_request');
Route::get('close_request/{item}', 'RequestController@close_request');

Route::post('create_request/{user}', 'RequestController@create_request');
Route::post('add_comment/{item}/{user}', 'RequestController@add_comment');
