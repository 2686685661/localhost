<template>
    <div class="container">
        <topComponent title="添加银行卡"></topComponent>
        <p class="listTop">绑卡需要您的短信验证码，短信已发送至您的手机:<br>{{ data.photo | telFilter }}</p>
        <ul class="formCom">
            <li>
                <label>
                    <span>验证码</span>
                    <input type="text" placeholder="请输入验证码" v-model.trim="smstrim">
                </label>
                <sendSms cls='code-text' auto="true" @sentAjax="smsAjax"></sendSms>
            </li>
        </ul>
        <div class="btnWarp">
            <span class="subBtn" @click="goSubmit">确认</span>
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
                smstrim:'',
                data:{}
            }
        },
        methods: {
            goSubmit:function () {
                var checkCode = /^[0-9]{6,8}$/;
                if(checkCode.test(this.smstrim) == false) this.callDialog('验证码输入格式错误');
                else {
                    this.$store.commit('uploadCreditData',{name:'userBank',val:true});
                    this.callDialog('保存成功','true',2000);
                    setTimeout(()=>{
                        this.$router.back();
                    },2000);
                }
            },
            smsAjax:function () {
                console.log('在此发送短信ajax--组件中已$emit该函数');
            }
        },
        filters: {
            telFilter:function (value) {
                var val = new String(value);
                return val.substring(0,3)+'****'+val.substring(7,11);
            }
        },
        mounted:function () {
            this.data = JSON.parse(this.$store.state.creditDatas['userBankTemp']);

        }
    }
</script>
<style>

</style>
