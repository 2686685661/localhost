<template>
    <div class="container">
        <topComponent title="借款详情">
            <span class="save" slot="right" @click="$router.push('/mecenter/merecord')">还款记录</span>
        </topComponent>
        <div class="borrowInfoTit">
            <template v-if='data.repayType === 2'>
                <dl>
                    <dt>还款方式<span class="col3">一次性还本付息</span></dt>
                    <dd>项目状态<span class="blue">{{data.statusStr}}</span></dd>
                </dl>
                <ul>
                    <li><b>{{data.interestAmount?data.interestAmount:'待定'}}</b>利息金额(元)</li>
                    <li><b>{{nextRefundDate}}</b>还款日</li>
                    <li><b>{{data.interestAmount?data.interestAmount:'待定'}}</b>授信金额(元)<i class='queryIcon' @click='alertKnow("sxje")'>?</i></li>
                </ul>
            </template>
            <template v-else>
                <dl>
                    <dt>还款方式<span class="col3">等额本息</span></dt>
                    <dd>项目状态<span class="blue">{{data.statusStr}}</span></dd>
                </dl>
                <ul>
                    <li><b>{{data.nextAmountNeed?data.nextAmountNeed:'待定'}}</b>应还金额(元）</li>
                    <li><b>{{nextRefundDate}}</b>下一个还款日</li>
                    <li><b>{{data.borrowAmount?data.borrowAmount:'待定'}}</b>授信金额(元)<i class='queryIcon' @click='alertKnow("sxje")'>?</i></li>
                </ul>
            </template>
        </div>
        <ul class="listCom list-arrow list-mini no-top">
            <li @click="goMore">更多详情</li>
        </ul>

        <ul class="listCom list-arrow list-mini no-top mt20" v-if='data.operates ===""'>
            <li @click='goReason' v-if="checkOperates(data.operates,'failReason')">查看理由</li>
            <li @click='goDeal' v-if="checkOperates(data.operates,'view_contact')">查看合同</li>
            <li @click='goRepay' v-if="checkOperates(data.operates,'repay')">还款</li>
        </ul>

        <alertKnow v-if='knowShow' :title='knowTit' :content='knowCon' @goHide='knowShow = !knowShow'></alertKnow>
    </div>
</template>

<script>

    import myData from '../../data/order/detail4web.json'
    export default {
        data:function () {
            return {
                knowShow:false,
                data:{}
            }
        },
        methods: {
            checkOperates:function (str,val) {
                //检查operates可提供的接下来的操作，如查看合同，还款等
                if(str.indexOf(val) > -1) return true;
                else return false;
            },
            goMore:function () {
                this.$router.push('/mecenter/borrowdetail/'+this.$route.params.id+'/more');
            }
        },
        mounted:function () {
            var pid = this.$route.params.id;
            this.data = myData.data;
            this.$store.commit('addBorrow',{id:pid,val:JSON.stringify(this.data)});
        },
        computed: {
            nextRefundDate:function () {
                if( this.data.nextRefundDate == undefined){
                    if( this.data.status == 107 || this.data.status == 207 ) return "无";
                    else return "待定";
                }else{
                    return this.data.nextRefundDate;
                }
            }
        }
    }
</script>
<style>

</style>
