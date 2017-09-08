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


Route::group(['middleware'=>['web']],function () {
    Route::get('diary/list',['uses'=>'diaryController@diaryview']);

    Route::any('diary/newdiary',['uses'=>'diaryController@newdiary']);

    Route::any('diary/updatediary/{id}',['uses'=>'diaryController@updatediary']);

    Route::any('diary/deletediary/{id}',['uses'=>'diaryController@deletediary']);

    Route::any('artical/list',['uses'=>'articalController@articalview']);

    Route::any('artical/newartical',['uses'=>'articalController@newartical']);

    Route::any('artical/updateartical/{id}',['uses'=>'articalController@updateartical']);

    Route::any('artical/deleteartical/{id}',['uses'=>'articalController@deleteartical']);
});

    Route::any('message/adoptlist',['uses'=>'messageController@adoptview']);

    Route::any('message/isadopt/{id}',['uses'=>'messageController@isadopt']);

    Route::get('message/delete/{id}',['uses'=>'messageController@delete']);

    Route::get('message/messagelist',['uses'=>'messageController@messageview']);

    Route::any('message/noadopt/{id}',['uses'=>'messageController@noadopt']);






