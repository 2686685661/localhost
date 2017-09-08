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




Route::group(['middleware'=>['web','auth']],function () {


    Route::group(['prefix' => 'artical'],function () {
        Route::get('list',['uses'=>'articalController@articalview']);

        Route::any('newartical',['uses'=>'articalController@newartical']);

        Route::any('updateartical',['uses'=>'articalController@updateartical']);

        Route::any('deleteartical/{id}',['uses'=>'articalController@deleteartical'])->middleware('vetion');
    });



    Route::group(['prefix' => 'diary'],function () {
        Route::any('updatediary',['uses'=>'diaryController@updatediary']);

        Route::any('deletediary/{id}',['uses'=>'diaryController@deletediary']);

        Route::get('list',['uses'=>'diaryController@diaryview']);

        Route::match(['get','post'],'newdiary',['uses'=>'diaryController@newdiary'])->middleware('forms');

    });



    Route::group(['prefix' => 'message'],function () {
        Route::get('adoptlist',['uses'=>'messageController@adoptview']);

        Route::any('isadopt/{id}',['uses'=>'messageController@isadopt']);

        Route::get('reply',['uses'=>'messageController@meagereply']);

        Route::get('delete/{id}',['uses'=>'messageController@delete']);

        Route::any('messagelist',['uses'=>'messageController@messageview']);

        Route::any('newemail/{id}',['uses'=>'messageController@neweamil']);

        Route::any('noadopt/{id}',['uses'=>'messageController@noadopt']);
    });




    Route::group(['prefix' => 'recovery'],function () {

        Route::any('artylist',['uses'=>'recoveryController@artyview']);

        Route::get('artyReduction/{id}',['uses'=>'recoveryController@artyReduction']);

        Route::get('artydelete/{id}',['uses'=>'recoveryController@artydelete']);

        Route::any('dialist',['uses'=>'recoveryController@diaview']);

        Route::get('diaReduction/{id}',['uses'=>'recoveryController@diaReduction']);

        Route::get('diadelete/{id}',['uses'=>'recoveryController@diadelete']);

        Route::any('meagelist',['uses'=>'recoveryController@meageview']);

        Route::any('fileslist',['uses'=>'recoveryController@filesview']);

        Route::get('meageReduction/{id}',['uses'=>'recoveryController@meageReduction']);


        Route::get('fileReduction/{id}',['uses'=>'recoveryController@fileReduction']);

        Route::get('filedelete/{id}',['uses'=>'recoveryController@filedelete']);


        Route::get('meagedelete/{id}',['uses'=>'recoveryController@meagedelete']);
    });




    Route::group(['prefix' => 'files'],function () {
        Route::any('picturelist',['uses'=>'filesController@pictureview']);

        Route::any('deletepic/{id}',['uses'=>'filesController@deletepic']);

        Route::any('doclist',['uses'=>'filesController@docview']);

        Route::any('videolist',['uses'=>'filesController@videoview']);

        Route::any('videoDescribe',['uses'=>'filesController@videoDescribe']);
    });


    Route::group(['prefix' => 'artiment'],function () {
        Route::any('artimentlist',['uses'=>'artimentController@artimentciew']);

        Route::any('mentdelete/{id}',['uses'=>'artimentController@mentdelete']);
    });


});




Route::group(['prefix'=> 'front'],function () {

    Route::any('frarticid/{id?}',['uses'=>'articalController@frarid'])->middleware('vetion');



    Route::get('frarticalview',['uses'=>'articalController@frarticalview']);

    Route::get('frontpicture',['uses'=>'filesController@frontpicture']);

    Route::get('frontdiary',['uses'=>'diaryController@frontdiary']);

    Route::any('frontmeage',['uses'=>'messageController@frontmeage']);

    Route::get('frfidown',['uses'=>'filesController@frfidown']);

});






Route::get('download/{name}',function ($name) {
    return response()->download(realpath(base_path('public/upload')).'/'.$name);
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
