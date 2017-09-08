<?php

namespace App\Http\Middleware;

use Closure;

class Activity
{
    //前置操作
//    public function handle($request,Closure $next) {
//
//        if(time() < strtotime('2017-06-05')) {
//            return redirect('activity0');
//        }
//
//        return $next($request);
//    }

    public function handle($request,Closure $next) {

//        if(time() < strtotime('2017-06-05')) {
//            return redirect('activity0');
//        }

//         $response = $next($request);
//        echo($response);
//
//
//        echo '我是后置操作';
    }
}