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
Route::get('/createprofile', 'UserController@create');
Route::get('/thread', 'ThreadController@index');
Route::get('/mythread', 'ThreadController@mythread');
Route::get('/user', 'UserController@index');

Route::resource('thread', 'ThreadController')->middleware('auth');
Route::patch('thread/{thread}', 'ThreadController@lock')->name('thread.lock')->middleware('auth');
Route::post('/thread/{thread}', 'ReplyController@store')->name('reply.store')->middleware('auth');
Route::post('/reply/{reply}', 'ReplyController@store2')->name('reply.store2')->middleware('auth');
Route::resource('reply', 'ReplyController', ['only' => ['edit', 'update', 'destroy']])->middleware('auth');
Route::resource('user', 'UserController')->middleware('auth');
Route::post('/user/{user}', 'UserController@store');
Route::resource('tag', 'TagController')->middleware('auth');

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');