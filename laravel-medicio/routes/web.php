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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'AdminController@index');
Route::get('/coba', 'AdminController@coba');
Route::get('/med', 'AdminController@medicine');
Route::get('/med/delete/{id}', 'AdminController@deletemed');
Route::get('/cat', 'AdminController@cat');
Route::get('/trans', 'AdminController@transaction');
Route::get('/trans/detail/{id}', 'AdminController@detailTrans');
Route::get('/cat/delete/{id}', 'AdminController@deletecat');
Route::post('/home/save','AdminController@addAccount');
Route::post('/cat/save','AdminController@createCat');
Route::post('/med/save','AdminController@createMed');

Route::get('/edit','AdminController@edit');
Route::get('/med/edit/{id}','AdminController@edit');
Route::post('/med/update','AdminController@update');

Route::get('/cat/editCat/{id}','AdminController@editCat');
Route::post('/cat/updateCat','AdminController@updateCat');
// Route::get('/account', 'AdminController@index');
