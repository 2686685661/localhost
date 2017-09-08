<template>
    <ul class="rewardList">
        <li v-for="item in datas">
            <p class="price"> <b>{{ item.faceValue }}</b>元</p>
            <p class="info">
                <span>{{ item.description }}</span>
                有效期至{{ item.loseTime }}
                <br>
                所有奖励券之间均不能叠加使用

            </p>
        </li>
    </ul>
</template>

<script>

    export default {
        props:['datas']
    }
</script>
<style>

</style>
