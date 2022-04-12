<?php

use App\Http\Controllers\StaskController;
use App\User;
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
    return view('welcome');
})->name('welcome');

Route::resource('user', 'UserController')->middleware('checkAdmin');

Route::get('show','StaskController@show')->name('stask.show');
Route::get('create','StaskController@create')->name('stask.create');
Route::get('store','StaskController@store')->name('stask.store');
Route::get('update','StaskController@update')->name('stask.update');
Route::get('edit','StaskController@edit')->name('stask.edit');
Route::get('destroy','StaskController@destroy')->name('stask.destroy');
Route::get('index','StaskController@index')->name('stask.index');