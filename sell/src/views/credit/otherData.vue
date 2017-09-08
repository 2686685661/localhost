<template>
    <div class="container">
        <topComponent title="其他资料"></topComponent>
        <p class="listTop">资料越完善，借款成功的概率越高，信用状况越好，需要支付的借款费用越少。</p>
        <ul class="listCom list-arrow no-top">
            <listComponent v-for="item in data" :title="item.title" @click="$router.push('/credit/dataupload/'+item.param)">
                <template slot="right">
                    <i class="hasSuc" :class="{noSuc:item.value == '未提供'}">{{ item.value }}</i>
                </template>
            </listComponent>
        </ul>
    </div>
</template>

<script>

    export default {
        data:function () {
            return {
                data: [
                    {title:'财力证明',value:'未提供',param:'otherFile'},
                    {title:'工资流水',value:'未提供',param:'salaryFile'},
                    {title:'个人征信报告',value:'未提供',param:'personCreditFile'},
                    {title:'社保',value:'未提供',param:'socialSecurityFile'},
                    {title:'信用卡账单',value:'未提供',param:'creditCardFile'},
                    {title:'工作证明',value:'未提供',param:'workFile'},
                    {title:'结婚证明',value:'未提供',param:'marriageFile'},
                    {title:'营业执照',value:'未提供',param:'businessLicenseFile'},
                    {title:'其它所有贷款协议/凭证',value:'未提供',param:'loanAgreementFile'}
                ]
            }
        },
        mounted:function () {
            for(var i=0;i<this.data.length;i++) {
                if(this.$store.state.ohterPicStatus[this.data[i].param] == true) {
                    this.data[i].value = '已提供';
                }
            }
        }
    }
</script>
<style>

</style>
