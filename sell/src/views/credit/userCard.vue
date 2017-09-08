<template>
    <div class="container">
        <topComponent title="身份认证"></topComponent>
        <p class="listTop">请拍摄身份证正反两面，以便确认身份</p>
        <ul class="photoCamera">
            <li class="facade noCamera">
                <i class="cameraIcon" @click="getPic1">正面</i>
                <img :src="data.pic1" alt="" v-if="data.pic1 !== ''">
            </li>
            <li class="obverse noCamera">
                <i class="cameraIcon" @click=getPic2>拍照</i>
                <img :src="data.pic2" alt="" v-if="data.pic2 !== ''">
            </li>
        </ul>
        <ul class="formCom mt20">
            <li>
                <div>
                    请确认身份证信息，如
                    <span class="red">有误请重拍</span>
                </div>
            </li>
            <li>
                <span>姓名</span>
                <input type="text" placeholder="请点击上方按钮拍照识别" readonly="readonly" v-model="data.name">
            </li>
            <li>
                <label>
                    <span>身份证</span>
                    <input type="text" readonly="readonly" v-model="data.card">
                </label>
            </li>
            <li>
                <label>
                    <span>签发机关</span>
                    <input type="text" readonly="readonly" v-model="data.issued">
                </label>
            </li>
            <li>
                <label>
                    <span>有效期限</span>
                    <input type="text" readonly="readonly" v-model="data.valid">
                </label>
            </li>
        </ul>
        <div class="btnWarp">
            <span class="subBtn" @click="goSubmit">确认</span>
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
                data: {
                    pic1:'',
                    pic2:'',
                    name:'',
                    card:'',
                    issued:'',
                    valid:''
                },
                imgPic:'../../../static/img/4EFEC782-8B33-7886-CE53-BBFCA82CE419.jpg'
            }
        },
        methods: {
            getPic1:function () {
                this.data.pic1 = this.imgPic;
                this.data.name = '测试数据';
                this.data.card =  '410482199806175518';
            },
            getPic2:function () {
                this.data.pic2 = this.imgPic;
                this.data.issued = '河南省汝州市王寨乡公安局';
                this.data.valid = '2020-10-20';
            },
            goSubmit:function () {
                if(this.data.name =='' || this.data.card == '') this.callDialog('请重拍正面照');
                else if(this.data.issued == '' || this.data.valid == '') this.callDialog('请重拍反面照');
                else {
                    this.$store.commit('uploadCreditStatu',{name:'userCard',val:true});
                    this.$store.commit('uploadCreditData',{name:'userCard',val:JSON.stringify(this.data)});
                    this.callDialog('保存成功','true',2000);
                    setTimeout(()=>{
                        this.$router.back();
                    },2000)
                }
            }
        },
        mounted:function () {
            if(this.$store.state.creditStatus['userCard'] == true) {
                if(this.$store.state.creditDatas['userCard'] !== undefined) {
                    this.data = JSON.parse(this.$store.state.creditDatas['userCard']);
                }
            }
        }
    }
</script>
<style>

</style>
