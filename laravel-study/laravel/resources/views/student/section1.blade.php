
@extends('layouts')

@section('header')
    @parent         {{-- 继承父模板的相应内容 --}}
    header
@stop

@section('sidebar')
    sidebar             {{-- 若无parent指令，则重写父模板的相应内容--}}
@stop


@section('content')
    content

    {{--<!--1，模板中输出PHP变量-->--}}
    {{--<p>{{$name}}</p>--}}


    {{--<!--2,模板中调用php代码-->--}}
    {{--<p>{{ time() }}</p>--}}
    {{--<p>{{ date('Y-m-d H:i:s',time()) }}</p>--}}
    {{--<p>{{ isset($name) ? $name : 'default' }}</p>--}}
    {{--<p>{{ $name or 'default' }}</p>--}}



    {{--<!--3，原样输出-->--}}
    {{--<p>@{{ $name }}</p>--}}




    {{--<!--4，引入子视图 include-->--}}
    {{--@include('student.common1',['message'=>'我是错误信息'])--}}







    {{--<br>--}}
    {{--@if($name == 'sean')--}}
        {{--I am sean--}}
    {{--@else--}}
        {{--who is?--}}
    {{--@endif--}}


    {{--<br>--}}
    {{--@unless($name!='sean')           --}}{{--unless相当于if的取反--}}
        {{--i am sean--}}
    {{--@endunless--}}


    {{--<br>--}}
    {{--@for($i=0;$i<3;$i++)--}}
        {{--<p>{{ $i }}</p>--}}
    {{--@endfor--}}


    {{--<br>--}}
    {{--@foreach($students as $student)--}}
        {{--<p>{{ $student->name }}</p>--}}
    {{--@endforeach--}}



    {{--@forelse($students as $student)--}}
        {{--<p>{{ $student->name }}</p>--}}
    {{--@empty--}}
        {{--<p>i is null</p>--}}
    {{--@endforelse--}}








    {{--模板中url--}}


    <a href="{{ url('url') }}">url()</a>
    <br>
    <a href="{{ action('StudentController@urlTest') }}">action()</a>   {{--通过指定控制器和方法名生成url--}}

    <br>
    {{--通过别名生成URL--}}
    <a href="{{ route('url') }}">route()</a>



@stop

