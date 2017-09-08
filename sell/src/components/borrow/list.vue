<template>
    <ul class="borrowList">
        <li v-for="item in datas" @click="goDetail(item.id)">
            <p class="fz26 w60P">编号 <span>{{ item.orderNo }}</span></p>
            <p>项目状态 <span class="blue">{{ item.statusStr }}</span></p>
            <p class="w60P col6">申请金额 <span>{{ item.applyAmount }}元</span></p>
            <p class="col6">借款期限 <span>{{ item.borrowLimit }}天</span></p>
        </li>
    </ul>
</template>

<script>

    export default {
        props:['datas'],
        methods: {
            goDetail:function (id) {
                this.$router.push('/mecenter/borrowDetail/'+id);
            }
        }
    }
</script>
<style>

</style>
