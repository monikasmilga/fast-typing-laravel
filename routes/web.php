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

//Route::get('/', function () {
//    return view('game');
//});

Route::get('/', ['as' => 'app.score.create', 'uses' => 'FTScoreController@create']);
Route::post('/', ['as' => 'app.score.store', 'uses' => 'FTScoreController@store']);

Route::get('/highscores', ['as' => 'app.score.index', 'uses' => 'FTScoreController@index']);
