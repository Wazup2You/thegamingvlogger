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
})->name('home');

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::prefix('games')->group(function() {
    Route::get('', 'GameItemController@index')->name('games');


    Route::name('games.')->middleware('auth')->group(function() {
        Route::get('create', 'GameItemController@create')->name('create');
        Route::post('store', 'GameItemController@store')->name('store');
        Route::get('{id}', 'GameItemController@show')->name('show');
        Route::get('{id}/edit', 'GameItemController@edit')->name('edit');
        Route::put('{id}', 'GameItemController@update')->name('update');
        Route::get('{id}/delete', 'GameItemController@destroy')->name('destroy');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/genres', 'GenreController@index')->name('genres');
Route::get('/profiles/', 'GameItemController@profile')->name('profiles');


