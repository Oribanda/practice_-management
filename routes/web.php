<?php

use Illuminate\Support\Facades\Route;
use Whoops\RunInterface;

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

Route::get('user', 'UserController@index');
Route::resource('user', 'UserController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('log_test', 'LogTestController@index');

Route::get('/', 'UserController@index');
Route::post('/store', [
    'as' => 'store', 'uses' => 'UserController@store'
]);

Route::get('/form', 'UserController@index');
