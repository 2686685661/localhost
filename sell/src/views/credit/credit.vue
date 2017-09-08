<template>
    <div class="container">
        <top-component title="草根金融"></top-component>
        <ul class="listCom list-arrow list-icon no-top">
            <listComponent v-for="item in lists" :class='item.cls' :title="item.tit" @click="$router.push(item.url)">
                <template slot="right">
                    <i class="hasSuc" v-show="item.isOk">已完成</i>
                </template>
            </listComponent>
        </ul>
        <footerComponent :idx="1"></footerComponent>
    </div>
</template>

<script type="application/ecmascript">
    export default {
       data:function () {
         return {
            lists: [
                {cls:'icon-info',tit:'个人信息',url:'/credit/userinfor',isOk:false,param:'userInfo'},
                {cls:'icon-urgent',tit:'紧急联系人',url:'/credit/usercontact',isOk:false,param:'userContact'},
                {cls:'icon-scan',tit:'人脸识别',url:'/credit/userface',isOk:false,param:'userFace'},
                {cls:'icon-phone',tit:'手机认证',	url:'/credit/userphoto',isOk:false,param:'userPhoto'},
                {cls:'icon-work',tit:'工作信息',url:'/credit/userwork',isOk:false,param:'userWork'},
                {cls:'icon-idPic',tit:'身份证认证',url:'/credit/usercard',isOk:false,param:'userCard'},
                {cls:'icon-fund',tit:'公积金授权',url:'/credit/useraccum',isOk:false,param:'userAccum'},
                {cls:'icon-shebao',tit:'社保授权',url:'/credit/usersocial',isOk:false,param:'userSB'},
                {cls:'icon-chuxu',tit:'储蓄卡流水导入',url:'/credit/bankcard',isOk:false,param:'bankLogin'},
                {cls:'icon-zhima',tit:'芝麻信用授权',url:'/credit/sesamecre',isOk:false,param:'userZhima'},
                {cls:'icon-bank',tit:'银行卡信息',url:'/credit/bankinfo',isOk:false,param:'userBank'},
                {cls:'icon-credit',tit:'查询央行征信',url:'/userreport',isOk:false, param:'userCredit'},
                {cls:'icon-alipay',tit:'支付宝认证',	url:'/credit/alipayauth',isOk:false,param:'alipayAuth'},
                {cls:'icon-other',tit:'其他资料',url:'/credit/otherdata',isOk:false,param:'userOhter'}
            ]
         }
       },
        mounted:function () {
            for( var i=0;i<this.lists.length;i++) {
                this.lists[i].isOk = this.$store.state.creditStatus[this.lists[i].param];
            }
        }
    }
</script>

<style>

</style>
