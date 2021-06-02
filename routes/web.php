<?php

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

Route::get('/', 'MainController@index');
Route::get('/about', 'MainController@about');
Route::get('/thread', 'ThreadController@index');
Route::resource('thread', 'ThreadController');
Route::post('/thread/{thread}', 'ReplyController@store')->name('reply.store');
Route::post('/reply/{reply}', 'ReplyController@store2')->name('reply.store2');
Route::resource('reply', 'ReplyController', ['only'=>['edit', 'update', 'destroy']]);