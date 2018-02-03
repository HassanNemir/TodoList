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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::any('/captcha', "Controller@viewUser");
Route::any('/haha', "Controller@viewUser");
Route::get('/addTodo', "todoCRUD@add");
Route::post('/add', "todoCRUD@add");
Route::get('/view', "todoCRUD@view")->name("view");
Route::get('/delete/{id}', "todoCRUD@delete");
Route::get('/edit/{id}', "todoCRUD@edit");
Route::post('/edit/{id}', "todoCRUD@edit");
Route::get('/add',  function () {
    return view('Todo.add');
})->name('add');
