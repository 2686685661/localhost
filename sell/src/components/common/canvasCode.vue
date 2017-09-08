<template>
    <div>
        <label>
            <span v-if="titShow">{{ title }}</span>
            <input type="text" :placeholder="indeval" :class="incls" v-model.trim="code">
        </label>
        <canvas id="canvas" :class="cancls" @click="changeCode"></canvas>
    </div>
</template>

<script>

    export default {
        data:function () {
            return {
                indeval:'',
                incls:'',
                cancls:'',
                code:'',
                canvas:{},
                title:'',
                titShow:true
            }
        },
        methods: {
            changeCode:function () {
                this.canvasCode.createCode(this.canvas);
            },
            watchCode:function() {
                this.$emit('codeHas',this.code);
            }
        },
        watch: {
            'code':'watchCode'
        },
        props:['icls','ccls','placeh','name','isTit'],
        mounted:function () {
            this.title = this.$options.propsData.name ===undefined ? '验证码' : this.$options.propsData.name;
           this.incls =  this.$options.propsData.icls === undefined ? '' : this.$options.propsData.icls;
            this.indeval = this.$options.propsData.placeh === undefined ? '请输入图形验证码' : this.$options.propsData.placeh;
            this.cancls = this.$options.propsData.ccls === undefined ? 'code-img' : this.$options.propsData.ccls;
            if(this.$options.propsData.isTit === 'false') this.titShow = false;
            this.canvas = document.getElementById('canvas');
            this.changeCode();
        }
    }
</script>
<style>

</style>
