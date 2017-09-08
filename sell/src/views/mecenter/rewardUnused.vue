<template>
    <div class="rewardWarp">
        <rewardTitle :idx="0"></rewardTitle>
        <rewardList v-if="hasReward" :datas="list"></rewardList>
        <pageErrors v-if="!hasReward" msg="暂无抵用卷" class="error-reward"></pageErrors>
    </div>

</template>

<script>
    import myData from '../../data/user/voucher1.json'
    export default {
        data:function () {
            return {
                hasReward:true,
                list:[]
            }
        },
        mounted:function () {
            if(myData.data.length == 0) this.hasReward = false;
            else this.list = myData.data
        }
    }
</script>
