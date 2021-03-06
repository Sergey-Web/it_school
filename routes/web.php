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


Auth::routes();

Route::get('/', ['uses' => 'HomeController@index'])->name('home');
Route::get('/home', ['uses' => 'HomeController@index'])->name('home');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@admin')->name('admin');
});

Route::post('/add-news', 'HomeController@update')->middleware(['auth'])->name('add-news');
Route::post('/delete-news', 'HomeController@deleteNews')->middleware(['auth','checkAdmin'])->name('delete-news');
Route::post('/edit-news', 'HomeController@editNews')->middleware(['auth','checkAdmin'])->name('edit-news');

