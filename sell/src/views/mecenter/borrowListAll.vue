<template>
    <div class="userBorrow">
        <borrowTitle :idx="0"></borrowTitle>
        <borrowList v-if="hasBorrow" :datas="list"></borrowList>
        <pageErrors v-if="!hasBorrow" :msg="borrowMsg" :class="borrowCls"></pageErrors>
        <noMore v-if="!hasMore"></noMore>
    </div>
</template>

<script>
    import data from '../../data/order/list1.json'
    export default {
        data:function () {
            return {
                list:[],
                hasBorrow:true,
                borrowMsg:'没有任何借款记录',
                borrowCls:'error-txt',
                hasMore:true
            }
        },
        mounted:function () {
            if(data.totalSize == undefined) {
                this.hasBorrow = false
            }
            else {
                this.list = data.data;
            }
        }
    }
</script>
<style>

</style>
