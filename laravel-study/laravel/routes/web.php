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
//    return view('welcome');
//});
//
//
//
//
//
//
//
//Route::get('basic1',function () {
//   return 'Hello World';
//});
//
//
//Route::group(['prefix' => 'member'],function () {
//    Route::get('user/center',['as'=>'center',function() {
//        return route('center');
//    }]);
//
//    Route::any('multy2',function () {
//        return 'member-multy2';
//    });
//});
//
//Route::get('view ',function () {
//    return view('welcome');
//});

//Route::get('member/info','MemberController@info');

//Route::get('member/info',[
//    'uses' => 'MemberController@info',
//    'as' => 'memberinfo'
//]);


Route::get('test1',['uses' => 'StudentController@test1']);


Route::get('query1',['uses' => 'StudentController@query1']);

Route::get('query2',['uses' => 'StudentController@query2']);

Route::get('query3',['uses' => 'StudentController@query3']);

Route::get('query4',['uses' => 'StudentController@query4']);

Route::get('query5',['uses' => 'StudentController@query5']);

Route::get('orm1',['uses' => 'StudentController@orm1']);

Route::get('orm2',['uses' => 'StudentController@orm2']);

Route::get('orm3',['uses' => 'StudentController@orm3']);

Route::get('orm4',['uses' => 'StudentController@orm4']);

Route::get('section1',['uses' => 'StudentController@section1']);

Route::get('url',['as'=>'url','uses' => 'StudentController@urlTest']);

Route::get('request1',['uses' => 'StudentController@request1']);


Route::group(['middleware'=>['web']],function () {
    Route::get('session1',['uses' => 'StudentController@session1']);

    Route::get('session2',[
        'as'=>'session2',
        'uses' => 'StudentController@session2']);
});

Route::get('response',['uses' => 'StudentController@response']);

//互动页面
Route::group(['middleware'=>['activity']],function () {
    Route::get('activity1',['uses' => 'StudentController@activity1']);

    Route::get('activity2',['uses' => 'StudentController@activity2']);
});
//宣传页面
Route::get('activity0',['uses' => 'StudentController@activity0']);


Route::get('/upload','StudentController@upload');







