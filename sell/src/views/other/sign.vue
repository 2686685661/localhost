<template>
    <div class="container bgF">
        <topComponent title="登录" :showLeft="false">
            <span class="back" slot="left" @click="goCancel">取消</span>
        </topComponent>
        <h2 class="logoIcon">草根金融</h2>
        <ul class="formCom form-login form-mini">
            <li class="icon-clear">
                <label>
                    <span>账号</span>
                    <input type="number" placeholder="请输入手机号" v-model.trim="name">
                    <i @click="name = ''"></i>
                </label>
            </li>
            <li :class='[{"icon-eye1":showPwd},{"icon-eye2":!showPwd}]'>
                <label>
                    <span>密码</span>
                    <input type="password" placeholder="请输入6~12位密码" v-model.trim="pwd" v-if="showPwd">
                    <input type="text" placeholder="请输入6~12位密码" v-model.trim="pwd" v-if="!showPwd">
                    <i @click='showPwd = !showPwd'></i>
                </label>
            </li>
            <li>
                <canvasCode @codeHas="sendCode"></canvasCode>
            </li>
        </ul>
        <div class="btnWarp">
            <span class="subBtn" @click="goSign">登录</span>
        </div>
        <div class="forgetWarp">
            <span class="col6" @click="$router.push('/register')">马上注册</span>
            <span class="fr col6" @click="$router.push('/forget')">忘记密码</span>
        </div>
        <transition name="scale">
            <dialogPopup v-show="daglogshow" :msg="daglogcontent" :class="daglogclass"></dialogPopup>
        </transition>
    </div>
</template>

<script>

    export default {
        data:function () {
            return {
                daglogshow:false,
                daglogcontent:'',
                daglogclass:'',
                name:'',
                pwd:'',
                code:'',
                showPwd:true  //开关--密码可见
            }
        },
        methods: {
            sendCode:function (val) {
                this.code = val;
            },
            goCancel:function () {
                this.$router.push('/loan');
            },
            goSign:function () {
                var checkName = /^[1][3578][0-9]{9}$/;
                var checkPwd = /^[\d\D]{6,12}$/;
                if(checkName.test(this.name) == false) this.callDialog('账号错误');
                else if(checkPwd.test(this.pwd) == false) this.callDialog('密码不正确');
                else if(this.code.toUpperCase() !== this.canvasCode.codeNums.toUpperCase()) this.callDialog('验证码不正确');
                else {
                    this.$router.push('/loan');
                }
            }
        }
    }
</script>
<style>

</style>
