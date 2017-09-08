<template>
    <div class="container bgF">
        <topComponent title="选择城市"></topComponent>
        <div class="selectCity">
            <dl v-for="(item,index) in data" id="item.letter" :class="{floatLetter:classPower == index}">
                <dt><a :name="item.letter" :ref="item.letter">{{ item.letter }}</a></dt>
                <dd v-for="city in item.citys">{{ city }}</dd>
            </dl>
            <p ref="floatLeft">
                <a v-for="(item,index) in data" @click="goPosition(index)">{{ item.letter }}</a>
            </p>
        </div>
    </div>
</template>

<script>

    import cityData from '../../data/cityData.json'
    import charfirst from '../../config/charfirst'
    export default {
        data:function () {
            return {
                data:[],
                offsets:{},
                offLength:0,
                classPower:0

            }
        },
        methods: {
            handleScroll:function () {
                var scrollY = window.scrollY+this.offsets['0'];   //scrollY:返回窗口沿垂直轴滚动的像素距离
                if(scrollY < this.offsets['0']) {
                    this.classPower = 0;
                }
                else if(scrollY >= this.offsets[this.offLength-1]) {
                    this.classPower = this.offLength-1;
                }
                else {
                    for(var i=0;i<this.offLength;i++) {
                        if(scrollY >= this.offsets[i] && scrollY < this.offsets[i+1]) {
                            this.classPower = i;
                            break;
                        }
                    }
                }
            },
            goPosition:function (index) {
                var start = window.scrollY;
                var end = this.offsets[index];
                var px = end-start,
                        time = 200,
                        b = 0,
                        m = 10;
                var step = px/time*m;
                var gopo = setInterval(function () {
                    b += m;
                    if(b == time) {
                        clearInterval(gopo);
                        window.scrollTo(0,this.offsets[index]);
                    }
                    else {
                        start += step;
                        window.scrollTo(0,start);
                    }

                },m)
            }
        },
        mounted:function () {
            this.data = charfirst.cityName(cityData);
            this.$nextTick(function () {
                var parHeight = this.$refs.floatLeft.offsetHeight;
                this.$refs.floatLeft.style.marginTop = '-'+parHeight/2 + 'px';
                for(var i=0;i<this.data.length;i++) {
                    this.offsets[i] = this.$refs[this.data[i].letter][0].offsetTop;
                    this.offLength++;
                }
                window.addEventListener('scroll',this.handleScroll);
            });
        },
        beforeDestroy:function () {
            window.removeEventListener('scroll',this.handleScroll);
        }
    }
</script>
<style>

</style>
