<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyWeb</title>
    <link rel="stylesheet" href="__ROOT__/css/login.css">
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/enroll.js"></script>
</head>
<body>
<div class="dialog" id="dialog">
    <div class="dialog-title">
        注册
    </div>
    <div class="dialog-content">
        <input id="name" class="input" type="text" placeholder="用户名"
               style="background: url(__ROOT__/img/input_username.png) no-repeat 0px -1px;" />
        <input id="password" class="input" type="password" placeholder="密码"
               style="background: url(__ROOT__/img/input_password.png) no-repeat 0px -1px; "/>
        <input id="confirmpassword" class="input" type="password" placeholder="确认密码"
               style="background: url(__ROOT__/img/input_password.png) no-repeat 0px -1px; "/>
        <div class="code-div clearboth">
            <input id="code" class="code" type="text" placeholder="验证码"/>
            <img id="code-img" class="code-img" src="/MyWeb/index.php/Login/code" alt="看不清楚，换一张"
                 onclick="javascript:newgdcode(this,this.src);">
        </div>
        <input type="submit" id="submit" class="submit" value="注册">
    </div>
</div>
</body>
</html>