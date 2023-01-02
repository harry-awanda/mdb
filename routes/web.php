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

Route::resource('Admin/Tag',    'App\Http\Controllers\TagController');
Route::get('Admin/Dashboard',   'App\Http\Controllers\AdminController@index');
Route::resource('Admin/Genre',  'App\Http\Controllers\genreController');
Route::resource('Admin/Movie',  'App\Http\Controllers\movieController');
Route::resource('Admin/Celebs', 'App\Http\Controllers\CelebController');
Route::resource('Admin/TVshow', 'App\Http\Controllers\tvshowController');
Route::resource('Admin/Service','App\Http\Controllers\serviceController');