<template>
    <ul class="tabTitle">
        <li v-for="(item,index) in data" :class="{on:index==idx}" @click="$router.push(item.url)">{{ item.name }}</li>
    </ul>
</template>

<script>

    export default {
        data:function () {
            return {
                data: [
                    {name:'全部',url:'/mecenter/borrowlist'},
                    {name:'申请中',url:'/mecenter/borrowlist/apply'},
                    {name:'待归还',url:'/mecenter/borrowlist/repay'},
                    {name:'已结束',url:'/mecenter/borrowlist/over'}
                ]
            }
        },
        props:['idx']
    }
</script>
<style>

</style>
