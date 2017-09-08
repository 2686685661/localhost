<template>
    <div class="container">
        <topComponent title="我的还款">
            <span class="save" slot="right" @click="$router.push('/mecenter/merecord')">还款记录</span>
        </topComponent>
        <template v-for="item in datas" v-if="hasRecord">
            <div class="repayList">
                <p class="tit">
                    <b class="fz28">还款日 {{ item.planTime }}</b>
                    <em class="fr fz26 col6">{{ item.periods }}期</em>
                </p>
                <p class="tit">
                    <em class="fz26 col6">已还款 {{ item.hasRepay }}</em>
                    <b class="fr fz28">{{ item.status | filterStatu }}</b
                    ></p>
                <p class="pt20">
                    应还本金
                    <span>{{ item.principal }}</span>
                </p>
                <p>
                    应还利息
                    <span>{{ item.interest }}</span>
                </p>
                <p>
                    管理费
                    <span>{{ item.manageAmount }}</span>
                </p>
                <p>
                    逾期费用
                    <span>{{ item.breachAmount }}</span>
                </p>
                <p>
                    已还款
                    <span>{{ item.hasRepay }}</span>
                </p>
                <p class="fz26 pt20 all">
                    应还总额
                    <span>{{ item.totalAmount }}</span>
                </p>
            </div>
            <span class="subBtn noRadius" @click="$router.push('/mecenter/repaygo/'+item.id+'/'+item.totalAmount)">还款</span>
        </template>
        <pageErrors :class="recordCls" v-if="!hasRecord" :msg="recordTit"></pageErrors>
    </div>
</template>

<script>

    import repayList from '../../data/order/list2.json'
    import orderDetail from '../../data/order/repay_list.json'
    export default {
        data:function () {
            return {
                datas:[],
                temp:[],
                recordCls:'error-record',
                hasRecord:true,
                recordTit:'暂无还款项目'
            }
        },
        filters: {
            filterStatu:function (val) {
                if(val == 0) return '待归还';
                else if(val == 2) return '部分归还';
                else if(val == 3) return '以逾期';

            }
        },
        mounted:function () {

            if(repayList.data.length !== 0) {
                for(var i=0;i<repayList.data.length;i++) {
                    for(var j=0;j<orderDetail.data.length;j++) {
                        if(orderDetail.data[j].status != 1) {
                            this.temp.push(orderDetail.data[j]);
                            break;
                        }
                    }
                }
                this.datas = this.temp;
            }
            else {
                this.hasRecord = false;
            }
        }
    }
</script>
<style>

</style>
