<template>
    <div class="container">
        <topComponent title="简版个人征信报告"></topComponent>
        <p class="reportBanner" @click="goLogin">
            <span class="look">
                <i></i>
                登录央行征信查看最新报告
            </span>
        </p>
        <dl class="reportList">
            <dt>历史征信报告 <span>未记录</span></dt>
            <dd @click="goCover"> <span class="time">2016-08-23</span>2015070703000178126968</dd>
            <dd @click="goCover"> <span class="time">2016-08-23</span>2015070703000178126968</dd>
            <dd @click="goCover"> <span class="time">2016-08-23</span>2015070703000178126968</dd>
        </dl>
        <div class="btnWarp">
            <span class="subBtn" @click="goLogin">申请最新征信报告</span>
        </div>
        <div class="btnWarp">
            <span class="subBtn greenBg" @click="goLogin">上传征信报告</span>
        </div>
    </div>
</template>

<script>

    export default {
        data:function () {
            return {

            }
        },
        methods: {
            goLogin:function () {
                this.$router.push('/userreport/login');
            },
            goCover:function () {
                console.log('aa');
                this.$router.push('/userreport/cover');
            }
        }
    }
</script>
<style>

</style>
