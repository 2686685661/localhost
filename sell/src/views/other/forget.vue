<template>
    <div class="container bgF">
        <topComponent title="忘记密码"></topComponent>
        <ul class="formCom form-login form-mini mt10">
            <li>
                <label>
                    <span>账号</span>
                    <input type="number" placeholder="请输入手机号" v-model.trim="name">
                    <i></i>
                </label>
            </li>
            <li>
                <label>
                    <span>验证码</span>
                    <input type="number" placeholder="请输入短信验证码" v-model.trim="smscode">
                </label>
                <sendSms @codeHas="sendCode"></sendSms>
            </li>
            <li :class='[{"icon-eye1":showPwd},{"icon-eye2":!showPwd}]'>
                <label>
                    <span>设置密码</span>
                    <input type="password" placeholder="请输入6-12位数字与字母组合密码" v-model.trim="pwd" v-if="showPwd">
                    <input type="text" placeholder="请输入6-12位数字与字母组合密码" v-model.trim="pwd" v-if="!showPwd">
                    <i @click="showPwd = !showPwd"></i>
                </label>
            </li>
        </ul>
        <div class="btnWarp">
            <span class="subBtn" @click="goSave">完成</span>
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
                smscode:'',
                pwd:'',
                showPwd:true
            }
        },
        methods: {
            goSave:function () {
                var checkPhone = /^[1][3578][0-9]{9}$/;
                var checkPwd = /^[\d\D]{6,12}$/;
                var checkSMS = /^[0-9]{4,8}$/;
                if(checkPhone.test(this.name) == false) this.callDialog('手机格式不正确');
                else if(checkSMS.test(this.smscode) == false) this.callDialog('验证码不正确');
                else if(checkPwd.test(this.pwd) == false) this.callDialog('密码格式错误');
                else {
                    this.$router.push('/loan');
                }
            },
            sendCode:function () {
                console.log('在此发送短信ajax--组件中已$emit该函数');
            }
        }
    }
</script>
<style>

</style>
