<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyWeb</title>
    <link rel="stylesheet" href="__ROOT__/css/backstage.css">
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/backstage.js"></script>
    <script src="__ROOT__/js/public.js"></script>
    <script src="__ROOT__/js/jquery.imgbox.pack.js"></script>
    <script>
        $(document).ready(function() {

            $(".img").imgbox({
                'speedIn'		: 0,
                'speedOut'		: 0,
                'alignment'		: 'center',
                'overlayShow'	: true,
                'allowMultiple'	: false
            });
        });
    </script>
    <!--<script type="text/javascript" charset="utf-8" src="__ROOT__/js/utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="__ROOT__/js/utf8-php/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="__ROOT__/js/utf8-php/lang/zh-cn/zh-cn.js"></script>-->
</head>
<body>
    <header>
        <nav>
            <div class="web-name">
                我的网站
            </div>
            <a class="logout" href="/MyWeb/index.php/Login/loginOut">注销</a>
        </nav>
    </header>
    <div class="main clearboth">
        <div class="main-nav">
            <nav class="clearboth">
                <ul class="nav-ul" id="nav-ul">
                    <li>
                        <div class="user-img ish" id="userData">
                            <div class="img-bg">
                                <img src="__HEADROOT__<?php echo $head ?>" alt="">
                            </div>
                            <?php
                                echo '<p class="name">'.$name.'</p>';
                            ?>
                        </div>
                    </li>
                    <li class="show-ul-ul">
                        <span class="nav-title ish1"  onclick="javascript:show_ul_ul(1);"><a>个人资料</a></span>
                        <div class="ul-ul">
                            <i class="ish" index="0" id="resetUserData"><a>修改个人资料</a></i>
                            <i class="ish" index="1" id="security"><a>账户安全</a></i>
                        </div>
                    </li>
                    <li class="show-ul-ul">
                        <span class="nav-title ish1"  onclick="javascript:show_ul_ul(2);"><a>文章</a></span>
                        <div class="ul-ul">
                            <i class="ish" index="2" id="allEssay"><a>所有文章</a></i>
                            <i class="ish" index="3" id="addEssay"><a>添加文章</a></i>
                        </div>
                    </li>
                    <li class="show-ul-ul">
                        <span class="nav-title ish1"  onclick="javascript:show_ul_ul(3);"><a>相册</a></span>
                        <div class="ul-ul">
                            <i class="ish" index="4" id="allPhoto"><a>所有图片</a></i>
                            <i class="ish" index="5" id="addPhoto"><a>添加图片</a></i>
                        </div>
                    </li>
                    <li class="show-ul-ul">
                        <span class="nav-title ish1"  onclick="javascript:show_ul_ul(4);"><a>游客资料</a></span>
                        <div class="ul-ul">
                            <i class="ish" index="6" id="searchEnroll"><a>查看资料</a></i>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <div class = "parts" id="parts">
            <div class="description">
                <p><?php echo $description?></p>
                <p class="by">———魏亚林</p>
            </div>
        </div>
    </div>
</body>
</html>