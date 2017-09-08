import Vue from 'vue';

import canvasCode from './canvasCode'

import alertKnowDatas from '../data/alertKnow.json'

export default {
    callDialog:function (msg, cls, time) {

        if(cls == undefined) {
            cls = 'sort';
        }
        if(time == undefined) {
            time = 1200;
        }
        this.daglogshow = true;
        this.daglogclass = cls;
        this.daglogcontent = msg;

        setTimeout(()=>{
            this.daglogshow = false;
        },time)
    },
    alertKnow:function (val) {
        for(var i=0;i<alertKnowDatas.length;i++) {
            if(alertKnowDatas[i].name == val) {
                this.knowTit = alertKnowDatas[i].title;
                this.knowCon = alertKnowDatas[i].content;
                this.knowShow = true;
            }
        }
    },
    jsonSort:function (data, key) {
        for(var j=1;j<data.length;j++) {
            var temp = data[j];
            var val = temp[key];
            var i = j-1;
            while(i >= 0 && data[i][key]>val) {
                data[i+1] = data[i];
                i=i-1;
            }
            data[i+1] = temp;
        }
        return data;
    },
    changeText:function () {
        if(this.textArea != this.defaultVal) {
            if(this.textArea.length <= 200) {
                this.textNum = 200 - this.textArea.length;
            }
            else {
                this.textArea = this.textArea.substring(0,200);
            }
        }
    },
    textFocus:function () {
        if(this.textArea == this.defaultVal) this.textArea = '';

    },
    textBlur:function () {
        if(this.textArea == '')
            this.textArea = this.defaultVal;
    },
    canvasCode:canvasCode

}
