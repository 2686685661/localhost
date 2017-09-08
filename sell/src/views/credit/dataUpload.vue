<template>
    <div class="container">
        <topComponent :title="data.tit">
            <span class="save" slot="right" @click="saveData">保存</span>
        </topComponent>
        <p class="listTop">{{ data.des }}</p>
        <ul id="setUploadWarp" class="uploadPic">
            <li v-for="(file,index) in fileData" @click=delthisimg(index)><img :src="file" alt=""></li>
            <li class="upload-btn" v-show="showInput">
                <label>
                    <input type="file" @change="myChange">
                </label>
            </li>
        </ul>
        <transition name="scale">
            <dialogPopup v-show="daglogshow" :class="daglogclass" :msg="daglogcontent"></dialogPopup>
        </transition>
    </div>
</template>

<script>
    import dataUploads from '../../data/dataUploan.json'
    export default {
        data:function () {
            return {
                paramid:'',
                data:{},
                daglogshow:false,
                daglogclass:'',
                daglogcontent:'',
                fileData:[],
                showInput:true
            }
        },
        methods: {
            myChange:function (event) {
                var _this = this;
                var thisfile = event.target.files[0];
                var support = ['image/jpg', 'image/jpeg', 'image/png','image/gif'];
                if(thisfile && support.indexOf(thisfile.type) >= 0) {
                    if(typeof FileReader != 'undefined') {
                        var reader = new FileReader();
                        reader.readAsDataURL(thisfile);
                        reader.onload = function () {
                            if(_this.checkArry(_this.fileData,this.result)) _this.callDialog('请不要重复上传同一张图片','text',2000);
                            else {
                                _this.fileData.push(this.result);
                            }
                        }
                    }
                    else {
                        this.callDialog('您的阅览器版本过低无法预览','text',2000);
                    }
                }
                else {
                    this.callDialog('上传图片格式不对','sort',1200);
                }
            },
            checkArry:function (arr,str) {
                var i = arr.length;
                while(i--) { if(arr[i] === str) return true; }
                    return false;
            },
            delthisimg:function (i) {
                this.fileData.splice(i,1);

            },
            limitImg:function () {
                if(this.fileData.length == this.data.num) this.showInput = false;
                else this.showInput = true;
            },
            saveData:function () {
                if(this.fileData.length == 0) {
                    this.$store.commit('uploadOhterPicData',{name:this.paramid,val:''});
                    this.$store.commit('changeOhterPicStatu',{name:this.sid,val:false});
                }
                else{
                    this.$store.commit('uploadOhterPicData',{name:this.paramid,val:JSON.stringify(this.fileData)});
                    if(this.fileData.length == dataUploads[this.paramid].num) {
                        this.$store.commit('changeOhterPicStatu',{name:this.paramid,val:true});
                    }
                    else {
                        this.$store.commit('changeOhterPicStatu',{name:this.paramid,val:false});
                    }
                }
                this.callDialog("保存成功","true",1200);
                setTimeout(()=>{
                    this.$router.back();
                },2000);
            }
        },
        mounted:function () {
            this.paramid = this.$route.params.param;
            this.data = dataUploads[this.paramid];
            var picdatas = this.$store.state.ohterPicDatas[this.paramid];
            if(picdatas !== undefined && picdatas !== '') {
                this.fileData = JSON.parse(picdatas);
            }
        },
        watch: {
            "fileData":"limitImg"
        }
    }
</script>
<style>

</style>
