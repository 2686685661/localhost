<template>
    <div class="container">
        <topComponent title="帮助中心"></topComponent>
        <ul class="listCom list-arrow list-help">
            <li v-for="(item,index) in datas" @click="$router.push('/mecenter/helpdetail/'+index)">{{ item.title }}</li>
        </ul>
    </div>
</template>

<script>

    import helpData from '../../data/helpDatas.json'
    export default {
        data:function () {
            return {
                datas:helpData
            }
        }
    }
</script>
<style>

</style>
