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

Route::get('/users', function () {
    return view('home');
});

Route::get('/users/{id?}', function ($id = '0') {
    return view(('home'), compact('id'));
})->where('id','[0-9A-Za-z]+');

Route::get('/contact', 'webController@contact');
