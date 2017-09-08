<template>
    <div class="container">
        <topComponent title="意见反馈">
            <span class="save" slot="right" @click="goSave">提交</span>
        </topComponent>
        <div class="feedBack mt20">
            <div class="feed-text" :class="{col5:textArea !== defaultVal}">
                <textarea maxlength="200" class="limitFeed" v-model.trim="textArea" @focus="textFocus()" @blur="textBlur()"></textarea>
            </div>
            <p class="feed-num">
                还可以输入
                <span class="limitNum">{{ textNum }}</span>
                字
            </p>
        </div>
        <transition name="scale">
            <dialogPopup v-show="daglogshow" :class="daglogclass" :msg="daglogcontent"></dialogPopup>
        </transition>
    </div>
</template>

<script>

    export default {
        data:function () {
            return {
                daglogshow:false,
                daglogclass:'',
                daglogcontent:'',
                defaultVal:'感谢您对草根金融的关注，您的意见和建议能帮助我们做的更好！',
                textNum:200,
                textArea:''
            }
        },
        methods: {
            goSave:function () {
                if(this.textArea == this.defaultVal | this.textArea.length <=5) this.callDialog('字数不能小于5','sort',1200);
                else {
                    this.callDialog('提交成功','sort',1200);
                    setTimeout(()=>{
                        this.$router.push('/mecenter');
                    },1500);
                }
            }
        },
        mounted:function () {
            this.textArea = this.defaultVal;
        },
        watch: {
            'textArea':'changeText'
        }
    }
</script>
<style>

</style>
