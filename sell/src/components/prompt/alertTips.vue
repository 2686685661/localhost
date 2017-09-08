<template>
    <div class="alertCheck">
        <div class="alertCheckCon">
            <p class="tipTit">{{ data.title }}</p>
            <p class="conDetail" v-html="data.content"></p>
            <p class="alertBtns" :class='{ two : hasTwo }'>
                <span class="btn cancelBtn" @click="btnClick1">{{ btnTxt1 }}</span>
                <span class="btn" :class='{ line : hasTwo }' @click="btnClick2">{{ btnTxt2 }}</span>
            </p>
        </div>
    </div>
</template>

<script>

    export default {
        data:function () {
            return {
                data: {
                    title:'取消上标',
                    content:'是否确认取消本次借款申请？<br>取消之后借款本金不会发放，也不会产生任何费用',
                    btn:["确认取消",'取消']
                },
                btnTxt1:'',
                btnTxt2:'',
                hasTwo:false
            }
        },
        methods: {
            btnClick1:function () {
                this.$emit('btnClick1');
            },
            btnClick2:function () {
                this.$emit('btnClick2');
            }
        },
        mounted:function () {
            if(this.data.btn.length == 2) this.hasTwo = true;

            this.btnTxt1 = this.data.btn[0];

            if(this.hasTwo == true) this.btnTxt2 = this.data.btn[1];
        }
    }
</script>
<style>

</style>
