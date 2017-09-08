<template>
    <div class="container">
        <topComponent title="支付宝认证"></topComponent>
        <template v-if="!isOk">
            <ul class="formCom mt20">
                <li>
                    <label>
                        <span>支付宝账号</span>
                        <input type="text" placeholder="请输入支付宝账号" v-model.trim="name">
                    </label>
                </li>
                <li>
                    <label>
                        <span>密码</span>
                        <input type="password" placeholder="请输入支付宝密码" v-model.trim="pass">
                    </label>
                </li>
            </ul>
            <div class="btnWarp">
                <span class="subBtn" @click="goSubmit">确认提交</span>
            </div>
            <p class="formTips">温馨提示：我们会严格保护您的隐私，您的账号信息不会被记录</p>
        </template>
        <template v-if="isOk">
            <div>已对接支付宝接口</div>
        </template>
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
                pass:'',
                isOk:false
            }
        },
        methods: {
            goSubmit:function () {
                var checkIllegal = /[#\$%\^&\*]/;
                if(this.name.length<=6 || checkIllegal.test(this.name) === true) this.callDialog('账号不合法');
                else if(this.pass.length<=6 || checkIllegal.test(this.pass) == true) this.callDialog('密码不合法');
                else {
                    this.$store.commit('uploadCreditStatu',{name:'alipayAuth',val:true});
                    this.callDialog("需对接支付宝接口","true",1500);
                    setTimeout(()=>{
                        this.$router.back();
                    },2000);
                }
            }
        },
        mounted:function () {
            if(this.$store.state.creditStatus['alipayAuth'] == true)
                this.isOk = true;
        }
    }
</script>
<style>

</style>
