<template>
    <div class="container">
        <topComponent title="请选择银行"></topComponent>
        <ul class="listCom list-arrow list-bank no-top">
            <li v-for="(item,index) in data" :class="item.cls" @click="$router.push('/credit/banklogin/'+index)">
                {{ item.name }}
                <i class="hasSuc" v-if="bankOk(index)">已完成</i>
            </li>
        </ul>
    </div>
</template>

<script>

    import waterBank from '../../data/waterBank.json'
    export default {
        data:function () {
            return {
                data:[],
                list:[]
            }
        },
        methods: {
            bankOk:function (index) {
               for( var i=0;i<this.list.length;i++) {
                   if(index == this.list[i]){
                       return true
                   }
               }
               return false;
            }
        },
        mounted:function () {
            this.data = waterBank;
            if(this.$store.state.creditStatus['bankLogin'] ==true) {
                for(var i=0;i<waterBank.length;i++) {
                    if(this.$store.state.bankLoginData[i] != undefined) {
                        this.list[i] = i;
                    }
                }
            }
        },

    }
</script>
<style>

</style>
