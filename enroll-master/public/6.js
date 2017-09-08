webpackJsonp([6],{

/***/ 108:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      imageUrl: '',
      activeIndex: '1',
      tableData: [],
      dialogVisible: false,
      editId: null
    };
  },

  methods: {
    handleAvatarSuccess: function handleAvatarSuccess(res, file) {
      this.imageUrl = URL.createObjectURL(file.raw);
    },
    beforeAvatarUpload: function beforeAvatarUpload(file) {
      var isJPG = file.type === 'image/jpeg';
      var isLt2M = file.size / 1024 / 1024 < 2;

      if (!isJPG) {
        this.$message.error('上传头像图片只能是 JPG 格式!');
      }
      if (!isLt2M) {
        this.$message.error('上传头像图片大小不能超过 2MB!');
      }
      return isJPG && isLt2M;
    },
    handleSelect: function handleSelect(key, keyPath) {
      console.log(key, keyPath);
    },
    handleClose: function handleClose(done) {
      done();
    },
    delete: function _delete() {}
  },
  mounted: function mounted() {
    var vue = this;
    this.$nextTick(function () {
      axios.post('/admin/index', {}).then(function (response) {
        vue.tableData = response.data;
      }).catch(function (response) {
        console.log(response);
      });
    });
  }
});

/***/ }),

/***/ 121:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(5)();
exports.push([module.i, "\n.avatar-uploader .el-upload {\n  border: 1px dashed #d9d9d9;\n  border-radius: 6px;\n  cursor: pointer;\n  position: relative;\n  overflow: hidden;\n}\n.avatar-uploader .el-upload:hover {\n  border-color: #20a0ff;\n}\n.avatar-uploader-icon {\n  font-size: 28px;\n  color: #8c939d;\n  width: 178px;\n  height: 178px;\n  line-height: 178px;\n  text-align: center;\n}\n.avatar {\n  width: 178px;\n  height: 178px;\n  display: block;\n}\n.el-dialog--tiny{\n  width: auto !important;\n}\n", ""]);

/***/ }),

/***/ 158:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "wrap"
  }, [_c('el-menu', {
    staticClass: "el-menu-demo",
    attrs: {
      "theme": "dark",
      "default-active": _vm.activeIndex,
      "mode": "horizontal"
    },
    on: {
      "select": _vm.handleSelect
    }
  }, [_c('el-menu-item', {
    attrs: {
      "index": "1"
    }
  }, [_vm._v("视频列表")]), _vm._v(" "), _c('el-submenu', {
    attrs: {
      "index": "2"
    }
  }, [_c('template', {
    slot: "title"
  }, [_vm._v("我的工作台")]), _vm._v(" "), _c('el-menu-item', {
    attrs: {
      "index": "2-1"
    }
  }, [_vm._v("选项1")]), _vm._v(" "), _c('el-menu-item', {
    attrs: {
      "index": "2-2"
    }
  }, [_vm._v("选项2")]), _vm._v(" "), _c('el-menu-item', {
    attrs: {
      "index": "2-3"
    }
  }, [_vm._v("选项3")])], 2), _vm._v(" "), _c('el-menu-item', {
    attrs: {
      "index": "3"
    }
  }, [_c('a', {
    attrs: {
      "href": "https://www.ele.me",
      "target": "_blank"
    }
  }, [_vm._v("订单管理")])])], 1), _vm._v(" "), _c('el-table', {
    staticStyle: {
      "width": "100%"
    },
    attrs: {
      "data": _vm.tableData,
      "stripe": ""
    }
  }, [_c('el-table-column', {
    attrs: {
      "prop": "id",
      "label": "编号"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "name",
      "label": "姓名"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "ticket",
      "label": "票数"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "edit",
      "label": "操作"
    },
    scopedSlots: _vm._u([{
      key: "default",
      fn: function(scope) {
        return [_c('el-button', {
          attrs: {
            "type": "primary",
            "icon": "edit",
            "size": "mini"
          }
        }), _vm._v(" "), _c('el-button', {
          attrs: {
            "type": "primary",
            "icon": "delete",
            "size": "mini"
          },
          on: {
            "click": function($event) {
              _vm.dialogVisible = true;
            }
          }
        })]
      }
    }])
  })], 1), _vm._v(" "), _c('el-dialog', {
    attrs: {
      "title": "提示",
      "visible": _vm.dialogVisible,
      "size": "tiny",
      "before-close": _vm.handleClose
    },
    on: {
      "update:visible": function($event) {
        _vm.dialogVisible = $event
      }
    }
  }, [_c('span', [_vm._v("这是一段信息")]), _vm._v(" "), _c('span', {
    staticClass: "dialog-footer",
    slot: "footer"
  }, [_c('el-button', {
    on: {
      "click": function($event) {
        _vm.dialogVisible = false
      }
    }
  }, [_vm._v("取 消")]), _vm._v(" "), _c('el-button', {
    attrs: {
      "type": "primary"
    },
    on: {
      "click": function($event) {
        _vm.dialogVisible = false
      }
    }
  }, [_vm._v("确 定")])], 1)])], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-e6160bce", module.exports)
  }
}

/***/ }),

/***/ 167:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(121);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(7)("ee6a496a", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"id\":\"data-v-e6160bce\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/vux-loader/src/style-loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Index.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"id\":\"data-v-e6160bce\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/vux-loader/src/style-loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Index.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 177:
/***/ (function(module, exports, __webpack_require__) {


/* styles */
__webpack_require__(167)

var Component = __webpack_require__(6)(
  /* script */
  __webpack_require__(108),
  /* template */
  __webpack_require__(158),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "D:\\PHP\\www\\toupiao\\resources\\assets\\js\\components\\Admin\\Index.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Index.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-e6160bce", Component.options)
  } else {
    hotAPI.reload("data-v-e6160bce", Component.options)
  }
})()}

module.exports = Component.exports


/***/ })

});