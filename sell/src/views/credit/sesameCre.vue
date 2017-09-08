<template>
    <div class="container bgF">
        <topComponent title="芝麻信用分"></topComponent>
        <div class="zhimaCanvas" v-if="isOk">
            <canvas id="zmCanvas" width="450px" height="450px"></canvas>
        </div>
        <pageErrors v-if="!isOk" msg="系统开小差了，没有找到您要的数据" class="error-zhima"></pageErrors>
        <div class="btnWarp">
            <span class="subBtn">查看最新芝麻分</span>
        </div>
    </div>
</template>

<script>

    import zhima from '../../config/zhima'
    export default {
        data:function () {
            return {
                isOk:true,
                num:0,
                time:''
            }
        },
        methods: {
            Range1:function (Min,Max) {
                var Range = Max - Min;
                var Rand = Math.random();
                var num = Min + Math.round(Rand * Range); //四舍五入
                return num;
            }
        },
        
        mounted:function () {
            if(Math.random()>0.5) this.isOk = false;

            this.num = this.Range1(350,950);			//分数取350-950之间随机数
            this.time = '2017-1-11 01:11:11';
            if(this.isOk == true) zhima.canvas('zmCanvas',this.num,this.time);
        }
    }
</script>
<style>

</style>
