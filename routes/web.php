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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list', 'ProductController@showList')->name('list');

Route::get('detail/{id}','ProductController@showDetail')->name('detail');
Route::post('detail/{id}','ProductController@update')->name('update');

Route::get('/search', 'ProductController@index')->name('search');

Route::get('/regist','ProductController@create')->name('regist');
Route::post('/regist','ProductController@registSubmit')->name('product.store');

Route::get('/edit/{id}','ProductController@edit')->name('edit');

Route::DELETE('/destroy/{id}','ProductController@destroy')->name('destroy');
