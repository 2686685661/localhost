<template>
    <div class="container">
        <topComponent :title="title"></topComponent>
        <ul class="formCom form-fund mt20">
            <li>
                <label>
                    <span>银行卡</span>
                    <input type="text" placeholder="请输入银行卡号" v-model.trim="data.card">
                </label>
            </li>
            <li>
                <label>
                    <span>账号</span>
                    <input type="text" placeholder="请输入身份证号/用户名" v-model.trim="data.id">
                    <p class="tips-bg">注意：必须先开通网银，如未开通，请在官网开通网银功能</p>
                </label>
            </li>
            <li>
                <label>
                    <span>密码</span>
                    <input type="text" placeholder="请输入登录密码" v-model.trim="data.password">
                    <p class="tips-nobg">如忘记密码请登录官网找回</p>
                </label>
            </li>
            <li>
                <canvasCode placeh="请输入右侧验证码" @codeHas="sendCode"></canvasCode>
            </li>
        </ul>
        <div class="btnWarp">
            <span class="subBtn" @click="goSubmit">确认提交</span>
        </div>
        <p class="formTips">温馨提示：请确认您填写的信息为本人所有，填写他人信息可能出现授权失败</p>
        <transition name="scale">
            <dialogPopup v-show="daglogshow" :class="daglogclass" :msg="daglogcontent"></dialogPopup>
        </transition>
    </div>
</template>

<script>

    import bankData from '../../data/waterBank.json'
    export default {
        data:function () {
            return {
                title:'',
                code:'',
                daglogshow:false,
                daglogclass:'',
                daglogcontent:'',
                index:'',
                data: {
                    card:'',
                    id:'',
                    password:''
                }
            }
        },
        methods: {
            goSubmit:function () {
                var checkId = /(^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$)|(^[1-9]\d{5}\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}$)/;
                var checkAdd = /[\u4E00-\u9FA5]{2,}/;
                var pasd = /^[\d\D]{6,12}$/;
                if(checkId.test(this.data.card) ==false) this.callDialog('银行卡格式错误');
                else if(checkId.test(this.data.id) == false )
                    this.callDialog('账号格式错误');
                else if(pasd.test(this.data.password) == false) this.callDialog('密码格式错误');
                else if(this.code.toUpperCase() !== this.canvasCode.codeNums.toUpperCase())
                    this.callDialog('验证码不正确');
                else {
                    this.$store.commit('uploadCreditStatu',{name:'bankLogin',val:true});
                    this.$store.commit('uploadBankLogin',{name:this.index,val:JSON.stringify(this.data)});
                    this.callDialog('提交成功','true',2000);
                    setTimeout(()=>{
                        this.$router.back();
                    },2000);
                }


            },
            sendCode:function (val) {
                this.code = val;
            }
        },
        mounted:function () {
            this.title = bankData[this.$route.params.index].name;
            this.index = this.$route.params.index;
        },
        created:function () {
            var i = this.$route.params.index;
            if(this.$store.state.creditStatus['bankLogin'] == true) {

                if(this.$store.state.bankLoginData[i] != undefined) {

                    this.data = JSON.parse(this.$store.state.bankLoginData[i]);
                }
            }
        },
        watch: {
            '$route' (to,from) {
                this.title = bankData[this.$route.params.index].name;
                this.index = this.$route.params.index;
            }
        }
    }
</script>
<style>

</style>
