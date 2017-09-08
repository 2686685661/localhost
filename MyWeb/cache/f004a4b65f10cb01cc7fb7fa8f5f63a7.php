<!doctype html>
<html lang="en" id= "scroll">
<head>
    <meta charset="UTF-8">
    <title>MyWeb</title>
    <link rel="stylesheet" href="/MyWeb/css/public.css">
    <link rel="stylesheet" href="/MyWeb/css/home.css">
    <script src="/MyWeb/js/jquery-3.2.1.min.js"></script>
    <script src="/MyWeb/js/home.js"></script>
    <script src="/MyWeb/js/jquery.imgbox.pack.js"></script>
<!--    <script>
        $(document).ready(function() {
            $(".imgss").imgbox({
                'speedIn'		: 0,
                'speedOut'		: 0,
                'alignment'		: 'center',
                'overlayShow'	: true,
                'allowMultiple'	: false
            });
        });
    </script>-->
</head>
<body>
    <header>
        <div class="main main-header">
            <div class="header-infor">
                <div class="infor">
                    <a class="login" href="/MyWeb/index.php/Enroll/enroll">注册</a>
                    <div class="infor-img">
                        <a class="imgss" href="/MyWeb/img/20170512185453_748.jpg"><img src="/MyWeb/img/20170512185453_748.jpg" alt="加载失败"></a>
                    </div>
                    <div class="infor-content">
                        <span class="name">魏亚林</span>
                        <p class="sign">个人说明：　　真正内心强大的人，一定有一颗平静的内心，有一颗温柔的心肠，有一颗智慧的头脑。一定经历过狂风暴雨，体验过高山低谷，也见识过人生百态。惟愿我们在人生的道路上，不论何种境遇都能充满智慧的刚强壮胆，成为内心强大的人。</p>
                    </div>
                </div>
                <p class="notice"></p>
            </div>
            <nav class="clearboth">
                <ul class="clearboth">
                    <li><a id="home" like="nav-module" index="0" class="nav-a click">首页</a></li>
                    <li><a id="essay" like="nav-module" index="1" class="nav-a">文章</a></li>
                    <li><a id="photo" like="nav-module" index="2" class="nav-a">图片</a></li>
                    <li><a id="secret" like="nav-module" index="3" class="nav-a">秘密</a></li>
                    <li><a id="show-essay" like="nav-module" index="4" class="nav-a">全文</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="main main-body">
        <!--首页-->
        <div like="module" class="module on">
            <div class="part clearboth">
                <div class="hot">
                    <p class="hot-essay">经典文章</p>
                    <div id="hot-essay">

                    </div>
                </div>
                <div class="new">
                    <p class="new-essay">最新文章</p>
                    <div id="new-essay">

                    </div>
                </div>
            </div>
        </div>
        <!--文章-->
        <div like="module" class="module" id="essay-module">
        </div>
        <!--图片-->
        <div like="module" class="module" id="photo-module">
        </div>
        <!--秘密-->
        <div like="module" class="module">
            <table align=center cellspacing=0 cellapacing=0 class="info-table">
                <tr><td class="table-title">姓名：</td><td>魏亚林</td></tr>
                <tr><td class="table-title">性别：</td><td>男</td></tr>
                <tr><td class="table-title">生日：</td><td>1997-12-23</td></tr>
                <tr><td class="table-title">职业：</td><td>大学生</td></tr>
                <tr><td class="table-title">故乡：</td><td>固始县</td></tr>
                <tr><td class="table-title">所在地：</td><td>新乡</td></tr>
                <tr><td class="table-title">公司：</td><td>三月软件</td></tr>
                <tr><td class="table-title">电话号：</td><td>18337393835</td></tr>
                <tr><td class="table-title">邮箱：</td><td>727299708@qq.com</td></tr>
                <tr><td class="table-title">签名：</td><td>心如止水</td></tr>
                <tr><td class="table-title">个人说明：</td><td>　　真正内心强大的人，一定有一颗平静的内心，有一颗温柔的心肠，有一颗智慧的头脑。一定经历过狂风暴雨，体验过高山低谷，也见识过人生百态。惟愿我们在人生的道路上，不论何种境遇都能充满智慧的刚强壮胆，成为内心强大的人。</td></tr>
            </table>
        </div>
        <!--文本展示区-->
        <div like="module" class="module" id="fullEssay">
            <div class="eaasy-content clearboth" id="eaasy-content">
            </div>
            <div class="comment">
                <div class="com" id="com">
                </div>
            </div>
            <div class="publish">
                <div style="float: left">
                    <p style="margin: 10px;float: left">用户名</p>
                    <input style="margin: 10px;float: left" type="text" id="name">
                </div>
                <div style="float: left">
                    <p style="margin: 10px;float: left">密码</p>
                    <input style="margin: 10px;float: left" type="password" id="password">
                </div>
                <textarea class="pub" maxlength="200" id="publish-content"></textarea>
                <button class="pub-but" id="pub-but">评论</button>
            </div>
        </div>
    </div>
</body>
</html>
