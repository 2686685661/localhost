<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\MyModel\Artical;
use Closure;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

use Illuminate\Routing\Controller as BaseController;

class ParameterVerification extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(preg_match("/^\d*$/",$request->route('id'))) {
            $is_id = Artical::find($request->route('id'));
            if(!$is_id) {

                echo '<p>该文章不存在</p><a style="cursor: pointer;color: #0000cc" onclick="history.back()">返回上一个页面</a>';

                exit;

            }
        }


        return $next($request);
    }
}
