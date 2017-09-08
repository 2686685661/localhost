<template>
    <div class="container">
        <topComponent title="注册征信账号"></topComponent>
        <div class="reportStepTit">
            <ul>
                <li class="step01 ok">
                    <i>1</i>
                    填写信息
                </li>
                <li class="step02">
                    <i>2</i>
                    补充信息
                </li>
                <li class="step03">
                    <i>3</i>
                    完成注册
                </li>
            </ul>
        </div>
        <ul class="formCom form-report mt20">
            <li class="user">
                <label>
                    <input type="text" placeholder="请输入登录名" v-model.trim="name">
                </label>
            </li>
            <li class="uid">
                <label>
                    <input type="text" placeholder="请输入身份证号" v-model.trim="id">
                </label>
            </li>
            <li class="safe">
                <canvasCode isTit="false" @codeHas="codeVal"></canvasCode>
            </li>
        </ul>
        <div class="btnWarp">
            <span class="subBtn" @click="goNext">下一步</span>
        </div>
    </div>
</template>

<script>
    export default {
        data:function () {
            return {
                name:'',
                id:'',
                code:''
            }
        },
        methods: {
            codeVal:function (val) {
                this.code = val;
            },
            goNext:function () {
                this.$router.push('/userreport/register2');
            }
        }
    }
</script>
<style>

</style>
