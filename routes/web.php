<?php

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


Route::get('/read/{id}','ArticleController@read');
Route::get('/tkl/{id}','ArticleController@tkl');
Route::get('/','ArticleController@index');
