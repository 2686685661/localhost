<template>
    <div class="container">
        <topComponent title="还款记录"></topComponent>
        <ul class="repayRecord" v-if="hasRecord">
            <li v-for="item in data">
                <p>
                    <span class="money">{{ item.repayAmount }}</span>
                    <span class="fr col6">{{ item.periods }}期</span>
                </p>
                <p>
                    {{ item.repayTime }}
                    <span class="fr">{{ item.orderNo }}</span>
                </p>
            </li>
        </ul>
        <pageErrors v-if="!hasRecord" :class="recordCls">
            <template slot='cont'>
                还没有任何还款记录哦<br>
                <span class="link" @click="$router.push('/loan')">去申请借款吧</span>
            </template>
        </pageErrors>
    </div>
</template>

<script>
    import repayData from '../../data/repay/repay_list.json'
    export default {
        data:function () {
            return {
                data:[],
                hasRecord:true,
                recordCls:'error-repay'
            }
        },
        mounted:function () {
            if(repayData.data.length !== 0)
                this.data = this.jsonSort(repayData.data,'repayTime');
        }
    }
</script>
<style>

</style>
