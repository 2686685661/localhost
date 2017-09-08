<template>
    <div class="container bgF">
        <topComponent title="注册" :showLeft="false">
            <span class="back" slot="left" @click="goSign">登录</span>
        </topComponent>
        <h2 class="logoIcon">草根金融</h2>
        <ul class="formCom form-login">
            <li>
                <label>
                    <span>手机号</span>
                    <input type="number" placeholder="请输入手机号" v-model.trim="name">
                </label>
            </li>
            <li>
                <canvasCode @codeHas="sendCode"></canvasCode>
            </li>
            <li>
                <label>
                    <span>短信验证码</span>
                    <input type="number" placeholder="请输入短信验证码" v-model.trim="smspwd">
                </label>
                <sendSms @sentAjax="smsAjax"></sendSms>
            </li>
            <li :class='[{"icon-eye1":showPwd},{"icon-eye2":!showPwd}]'>
                <label>
                    <span>登录密码</span>
                    <input type="password" placeholder="请输入6~12位密码" v-model.trim="pwd" v-if="showPwd">
                    <input type="text" placeholder="请输入6~12位密码" v-model.trim="pwd" v-if="!showPwd">
                    <i @click="showPwd = !showPwd"></i>
                </label>
            </li>
            <li :class='[{"icon-eye1":showagapwd},{"icon-eye2":!showagapwd}]'>
                <label>
                    <span>确认密码</span>
                    <input type="password" placeholder="请输入6~12位密码" v-model.trim="againpwd" v-if="showagapwd">
                    <input type="text" placeholder="请输入6~12位密码" v-model.trim="againpwd" v-if="!showagapwd">
                    <i @click="showagapwd = !showagapwd"></i>
                </label>
            </li>
        </ul>
        <div class="btnWarp">
            <span class="subBtn" :class='{grayBg:!checked}' @click="goReg">立即注册</span>
        </div>
        <div class="agreeMent mt20" :class='{ no : !checked }' @click="checked = !checked">
            我已阅读并同意
            <span class="blue">《草根信贷用户协议》</span>
            <input type="checkbox" v-model="checked">
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
                code:'',
                smspwd:'',
                pwd:'',
                againpwd:'',
                showPwd:true,
                showagapwd:true,
                checked:true
            }
        },
        methods: {
            goSign:function () {
                this.$router.push('/sign');
            },
            goReg:function () {
                var checkPhone = /^[1][3578][0-9]{9}$/;
                var checkPwdOne = /^[\d\D]{6,12}$/;
                var checkSMS = /^[0-9]{4,8}$/;
                if(this.checked == false) this.callDialog('请阅读并同意协议');
                else if(checkPhone.test(this.name) == false) this.callDialog('手机格式不正确');
                else if(this.code.toUpperCase() !== this.canvasCode.codeNums.toUpperCase()) this.callDialog('图片验证码不正确');
                else if(checkSMS.test(this.smspwd) == false) this.callDialog('短信验证码不正确');
                else if(checkPwdOne.test(this.pwd) == false) this.callDialog('密码格式不正确');
                else if(this.pwd !== this.againpwd) this.callDialog('确认密码不正确');
                else {
                    this.$router.push('sign');
                }
            },
            sendCode:function (val) {
                this.code = val;
            },
            smsAjax:function () {
                console.log('在此发送短信ajax--组件中已$emit该函数');
            }
        }
    }
</script>
<style>

</style>
