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
    Route::prefix('note')->group(function() {
        Route::post('store/{user}', 'NoteController@store');
        Route::get('create', 'NoteController@create');
        Route::get('{note}/edit', 'NoteController@edit');
        Route::put('{note}/update', 'NoteController@update');
        Route::delete('{note}/delete', 'NoteController@delete');
    });
    
    
    Route::delete('/answer/{answer}', 'AnswerController@delete');
    
    Route::prefix('question')->group(function() { 
        Route::post('store', 'QuestionController@store');
        Route::get('create', 'QuestionController@create');
        Route::get('{question}/edit', 'QuestionController@edit');
        Route::put('{question}/update', 'QuestionController@update');
        Route::delete('{question}/delete', 'QuestionController@delete');
        Route::get('{question}/answer/{answer}/edit', 'AnswerController@edit');
        Route::put('{question}/answer/{answer}/update', 'AnswerController@update');
        Route::post('{question}/comment', 'QuestionController@comment');
        Route::post('{question}/bookmark', 'UserController@bookmark');
        Route::delete('{question}/unbookmark', 'UserController@unbookmark');
    });
});

#コントローラーごとに分ける
#URLが短い順で並べる
Route::get('/', 'QuestionController@index');
Route::get('/tags', 'TagController@tags');
Route::get('/tags/{tag}', 'TagController@index');
ROute::get('/user/{user}', 'UserController@profile');
Route::get('/question/{question}', 'QuestionController@show');
Route::post('/question/{question}/answer/', 'AnswerController@store');
Route::get('/note/{note}', 'NoteController@show');


Auth::routes();


