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
});

#コントローラーごとに分ける
#URLが短い順で並べる
Route::get('/', 'QuestionController@index');
#Route::get('/question',);
Route::get('/question/{question}', 'QuestionController@show');


Route::post('/answer/', 'AnswerController@store');


Auth::routes();


