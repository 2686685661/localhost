<template>
    <div class="container">
        <topComponent title="注册征信账号"></topComponent>
        <div class="reportStepTit">
            <ul>
                <li class="step01 ok">
                    <i>1</i>填写信息
                </li>
                <li class="step02 ok">
                    <i>2</i>补充信息
                </li>
                <li class="step03">
                    <i>3</i>完成注册
                </li>
            </ul>
        </div>
        <ul class="formCom form-reportReg mt20">
            <li>
                <label>
                    <span>登录名</span>
                    <input type="text" placeholder="请输入登录名">
                </label>
            </li>
            <li>
                <label>
                    <span>密码</span>
                    <input type="password" placeholder="6~12位且必须同时包含数字和字母">
                </label>
            </li>
            <li>
                <label>
                    <span>确认密码</span>
                    <input type="password" placeholder="请再次输入密码">
                </label>
            </li>
            <li>
                <label>
                    <span>手机号</span>
                    <input type="text" placeholder="请输入手机号">
                </label>
            </li>
            <li>
                <label>
                    <span>短信验证码</span>
                    <input type="text" placeholder="由6位字母及数字组成">
                    <sendSms></sendSms>
                </label>
            </li>
        </ul>
        <div class="btnWarp">
            <span class="subBtn">下一步</span>
        </div>
    </div>
</template>

<script>

</script>
<style>

</style>
