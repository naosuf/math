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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/create', 'QuestionController@create');
    Route::post('/question', 'QuestionController@store');
    Route::delete('/answer/{answer}', 'AnswerController@delete');
    Route::delete('/question/{question}', 'QuestionController@delete');
    Route::get('/question/{question}/edit', 'QuestionController@edit');
    Route::put('/question/{question}', 'QuestionController@update');
    Route::get('/question/{question}/answer/{answer}/edit', 'AnswerController@edit');
    Route::put('/question/{question}/answer/{answer}', 'AnswerController@update');
    Route::post('/question/{question}/comment', 'QuestionController@comment');
    Route::post('/question/{question}/bookmark', 'UserController@bookmark');
    Route::delete('/question/{question}/unbookmark', 'UserController@unbookmark');
;});

#コントローラーごとに分ける
#URLが短い順で並べる
Route::get('/', 'QuestionController@index');
Route::get('/tags', 'TagController@tags');
Route::get('/tags/{tag}', 'TagController@index');
ROute::get('/user/{user}', 'UserController@profile');
#Route::get('/question',);
Route::get('/question/{question}', 'QuestionController@show');


Route::post('/question/{question}/answer/', 'AnswerController@store');


Auth::routes();


