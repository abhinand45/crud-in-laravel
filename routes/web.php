<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', 'App\Http\Controllers\UserController@create');

Route::get('', 'App\Http\Controllers\HomeContoller@home');
Route::post('details/create', 'App\Http\Controllers\HomeContoller@insert');
Route::post('details/edit/{id}', 'App\Http\Controllers\HomeContoller@edit')->name('items.edit');
Route::post('details/update/{id}', 'App\Http\Controllers\HomeContoller@update')->name('items.update');
Route::post('details/delete/{id}', 'App\Http\Controllers\HomeContoller@delete')->name('items.destroy');

