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
Route::get('/thread/oldest', 'ThreadController@index2');
Route::get('/thread/latest', 'ThreadController@index3');
Route::get('/mythread', 'ThreadController@mythread');
Route::get('/user', 'UserController@index');
Route::get('/createprofile', 'UserController@create')->middleware('auth');
Route::get('/changepassword', 'UserController@changepassword')->middleware('auth');

Route::resource('thread', 'ThreadController')->middleware('auth');
Route::put('/thread/like/{thread}', 'ThreadController@like')->name('thread.like');
Route::put('/thread/dislike/{thread}', 'ThreadController@dislike')->name('thread.dislike');
Route::patch('thread/{thread}', 'ThreadController@lock')->name('thread.lock');
Route::post('/thread/{thread}', 'ReplyController@store')->name('reply.store');
Route::post('/reply/{reply}', 'ReplyController@store2')->name('reply.store2');
Route::resource('reply', 'ReplyController', ['only' => ['edit', 'update', 'destroy']])->middleware('auth');
Route::resource('user', 'UserController')->middleware('auth');
Route::post('/user/{user}', 'UserController@store');
Route::put('/changepassword/{user}', 'UserController@updatepassword')->name('user.updatepassword');
Route::resource('tag', 'TagController')->middleware('auth');

Auth::routes();