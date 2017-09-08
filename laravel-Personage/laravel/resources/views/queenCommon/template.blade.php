{{--
    后台模板
--}}
<!DOCTYPE html>
{{--<html xmlns="http://www.w3.org/1999/xhtml">--}}
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my personage - @yield('title')</title>
    <link href="{{ asset('static/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    {{--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />--}}
    @section('style')

    @show
</head>
<body>
<div id="wrapper">
    @section('header')
    {{--//上边导航栏--}}
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;TWO PAGE</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">See Website</a></li>
                    <li><a href="#">Open Ticket</a></li>
                    <li><a href="#">Report Bug</a></li>
                </ul>
            </div>

        </div>
    </div>
    @show


    @section('leftmenu')
    {{--//左侧导航栏--}}
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center user-image-back">
                    <img src="{{ asset('img/find_user.png') }}" class="img-responsive" />

                </li>


                <li>
                    <a href="#"><i class="fa fa-edit "></i>文章管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('artical/newartical') }}">新增文章</a>
                        </li>
                        <li>
                            <a href="{{ url('artical/list') }}">文章列表</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-edit "></i>日记管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('diary/newdiary') }}">写日记</a>
                        </li>
                        <li>
                            <a href="{{ url('diary/list') }}">日记列表</a>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="#"><i class="fa fa-edit "></i>留言管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('message/messagelist') }}">留言列表</a>
                        </li>
                        <li>
                            <a href="{{ url('message/adoptlist') }}">待审核</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-table "></i>回收站</a>
                </li>


                <li>
                    <a href="#"><i class="fa fa-sitemap "></i>Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>

                            </ul>

                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-qrcode "></i>Tabs & Panels</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i>Mettis Charts</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-edit "></i>Last Link </a>
                </li>
                <li>
                    <a href="blank.html"><i class="fa fa-table "></i>Blank Page</a>
                </li>
            </ul>

        </div>

    </nav>
    @show


    {{--//右侧内容区域--}}
    <div id="page-wrapper">
        <div id="page-inner">

            @include('queenCommon.message')

            @yield('connect')
        </div>
    </div>
</div>

<script src="{{ asset('static/jquery/jquery-1.10.2.js') }}"></script>

<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('static/jquery/jquery.metisMenu.js') }}"></script>

<script src="{{ asset('js/custom.js') }}"></script>

@section('javascript')

@show
</body>
</html>
