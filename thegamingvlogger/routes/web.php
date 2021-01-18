<?php

use App\BlogItem;
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

Route::get('games', 'GameItemController@index')->name('games');
Route::get('games/create', 'GameItemController@create')->name('games.create');
Route::post('games/store', 'GameItemController@store')->name('games.store');
Route::get('games/{id}', 'GameItemController@show')->name('games.show');

//Route::get('/blogs', 'BlogItemController@index');
//
//Route::get('/blogs/{blog}', 'BlogItemController@show');
//
//Route::get('test', function () {
//    return view('test');
//});

//Route::get('/', function (){
//    return view('test', [
//        'name' => request('name')
//    ]);
//});


//Route::get('/posts/{post}', 'PostController@show');
//
//
Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/blog', 'BlogItemController@index')->name('blog');
