<template>
    <div class="container">
        <topComponent title="央行征信登录"></topComponent>
        <ul class="formCom form-report mt20">
            <li class="user">
                <label>
                    <input type="text" placeholder="请输入登录名">
                </label>
            </li>
            <li class="pass">
                <label>
                    <input type="password" placeholder="请输入密码">
                </label>
            </li>
            <li class="safe">
                <canvasCode isTit="false"></canvasCode>
            </li>
        </ul>
        <div class="btnWarp">
            <span class="subBtn">确认提交</span>
        </div>
        <div class="btnWarp">
            <span class="subBtn blueLight" @click="goregster">注册征信查询账号</span>
        </div>
    </div>
</template>

<script>

    export default {
        methods: {
            goregster:function () {
                this.$router.push('/userreport/register1');
            }
        }
    }
</script>
<style>

</style>
