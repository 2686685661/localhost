<template>

    <ul class="tabTitle">
        <li v-for="(item,index) in datas" :class="{on:index == idx}" @click="$router.push(item.push)">{{ item.name }}</li>
    </ul>
</template>

<script>

    export default {
        data:function () {
            return {
                datas:[
                    {name:"未使用",	push:"/mecenter/rewardlist"},
                    {name:"已使用",	push:"/mecenter/rewardlist/used"},
                    {name:"已失效",	push:"/mecenter/rewardlist/expired"}
                ]
            }
        },
        props:['idx']
    }
</script>

