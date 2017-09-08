<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;


class StudentController extends Controller
{
    //
    public function mail() {



//        $name = '王宝花';
//        $flag = Mail::send('emails.test',['name'=>$name],function($message){
//            $to = '2686685661@qq.com';
//            $message ->to($to)->subject('邮件测试');
//        });
//        if($flag){
//            echo '发送邮件成功，请查收！';
//        }else{
//            echo '发送邮件失败，请重试！';
//        }


        //通过模板发送邮件
        Mail::send('emails.test',['name'=>'李静'],function ($message) {
            $message->subject('生日快乐');
            $message->to('2686685661@qq.com');
        });

    }


    public function cache1() {

        //put()保存对象到缓存中
//        Cache::put('key1','val1',10);


        //add() 返回值为bool
//        $bool = Cache::add('key2','val2',10);
//        var_dump($bool);

        //forever() 永久的保存对象到缓存中
//        Cache::forever('key3','key3');

        //has() 判断key值是否存在
        if(Cache::has('key1')) {
            echo 1;
        }else {
            echo 0;
        }

    }

    public function cache2() {

        //get() 从缓存中获取对象
        $val = Cache::get('key1');
        var_dump($val);



        //pull() 从缓存中取出对象后删除该对象
        Cache::pull('key1');

        //forget() 从缓存中删除对象，返回true,否则返回false

    }
}
