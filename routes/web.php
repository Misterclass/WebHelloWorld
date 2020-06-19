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
    return view('login');
})->name('index');

Route::get('/users/{id}', 'UsersController@show')->name('users');
Route::get('/users/snippets/{userName}', 'UsersController@getUserSnippets')->name('users.snippets');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/snippets', 'HomeController@getSnippets')->name('home.snippets');
Route::get('/users', 'GroupController@index')->name('students');
Route::get('/userslist', 'GroupController@getUsers')->name('users.list');
Route::post('/api-token-auth', 'LoginController@login')->name('login');

Route::get('snippets/create','SnippetController@create')->name('snippets.create');
Route::get('snippets/edit/{id}','SnippetController@edit')->name('snippets.edit');
Route::get('snippets/{id}','SnippetController@show')->name('snippets.show');
Route::post('snippets','SnippetController@store')->name('snippets.store');
Route::post('snippets/{id}','SnippetController@update')->name('snippets.update');
Route::get('snippets/destroy/{id}','SnippetController@destroy')->name('snippets.delete');
