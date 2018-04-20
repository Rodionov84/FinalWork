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
    return view('index');
});

Route::get('/new_question', ['uses' => 'QuestionsController@newQuestion']);

Route::get('/success_question', ['uses' => 'QuestionsController@successQuestion']);

Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>['web','auth']], function () {

    Route::get('/',  ['uses' => 'Admin\AdminController@indexPage']);

    Route::get('/users', ['uses' => 'Admin\UsersController@listPage']);
    Route::get('/users/create', ['uses' => 'Admin\UsersController@createPage']);
    Route::get('/users/edit', ['uses' => 'Admin\UsersController@editPage']);
    Route::get('/users/delete', ['uses' => 'Admin\UsersController@deletePage']);

    Route::get('/categories', ['uses' => 'Admin\CategoriesController@listPage']);
    Route::get('/categories/delete', ['uses' => 'Admin\CategoriesController@deletePage']);
    Route::get('/categories/edit', ['uses' => 'Admin\CategoriesController@editPage']);
    Route::get('/categories/create', ['uses' => 'Admin\CategoriesController@createPage']);

    Route::get('/categories/questions', ['uses' => 'Admin\QuestionsController@listPage']);
    Route::get('/questions', ['uses' => 'Admin\QuestionsController@listPage']);
    Route::get('/questions/hide', ['uses' => 'Admin\QuestionsController@hidePage']);
    Route::get('/questions/show', ['uses' => 'Admin\QuestionsController@showPage']);
    Route::get('/questions/edit', ['uses' => 'Admin\QuestionsController@editPage']);
    Route::get('/questions/delete', ['uses' => 'Admin\QuestionsController@deletePage']);

});

Route::get('/home', 'HomeController@index')->name('home');
