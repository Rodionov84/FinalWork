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
    return view('tpl.main')->with("title", "FAQ")->with("content", view('index'));
});

//Обработка контроллером и методом askQuestion формы добавления вопроса
Route::get('/new_question', ['uses' => 'QuestionsController@newQuestion']);

Route::get('/success_question', ['uses' => 'QuestionsController@successQuestion']);

Route::get('/admin',  ['uses' => 'AdminUsersController@show']);

Route::get('/admin/users', ['uses' => 'AdminUsersController@listPage']);
Route::get('/admin/users/create', ['uses' => 'AdminUsersController@createPage']);
Route::get('/admin/users/edit', ['uses' => 'AdminUsersController@editPage']);

Route::get('/admin/auth/', ['uses' => 'AdminUsersController@show']);