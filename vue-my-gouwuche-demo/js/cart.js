
var vm = new Vue({
    el:"#app",
    data:{
        totalMoney:0,
        productList:[],
        checkAllFlag:false,
        delFlag:false,
        curProduct:''

    },
    filters:{
        formaMoney:function (value) {
            return "￥"+value.toFixed(2);
        }
    },
    mounted: function () {
        this.$nextTick(function () {
            this.cartView();
        });



    },
    methods: {
        cartView: function () {
            let _this = this;
            this.$http.get("data/cartData.json").then(res=> {
                //es6的箭头函数的好处是函数的作用域已经指向了函数外层，且函数内的this与函数外的this达到同一级别
                this.productList = res.data.result.list;
                // this.totalMoney = res.data.result.totalMoney;
            });
        },
        changeMoney: function (product, way) {
            if (way > 0) {
                product.productQuantity++;
            } else {
                product.productQuantity--;
                if (product.productQuantity < 1) {
                    product.productQuantity = 1;
                }
            }
            this.calcTotalPrice();
        },
        selectedProduct: function (item) {
            if (typeof item.checked == 'undefined') {
                // Vue.set(item,"checked",true);
                this.$set(item, "checked", true);
            } else {

                item.checked = !item.checked;
            }
            this.calcTotalPrice();
        },
        checkAll: function (flag) {
            this.checkAllFlag = flag;
            var _this = this;

            this.productList.forEach(function (item, index) {
                if (typeof item.checked == 'undefined') {
                    // Vue.set(item,"checked",true);
                    _this.$set(item, "checked", true);
                } else {

                    item.checked = _this.checkAllFlag;
                }
            })
            this.calcTotalPrice();
        },
        calcTotalPrice: function () {
            var _this = this;
            this.totalMoney = 0;
            this.productList.forEach(function (item, index) {
                if (item.checked) {
                    _this.totalMoney += item.productPrice * item.productQuantity;
                }
            });
        },
        delConfirm: function (item) {
            this.delFlag = true;
            this.curProduct = item;
        },
        delProduct: function () {
            var index = this.productList.indexOf(this.curProduct);
            this.productList.splice(index, 1);
            this.delFlag = false;
            this.calcTotalPrice();
        }
    }
});
Vue.filter("money",function(value,type) {
    return "￥" + value.toFixed(2) + type;
})
