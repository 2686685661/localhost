<template>
  <div class="wrap">
    <el-col :span="24" class="toolbar" style="padding-bottom: 0px;">
      <el-form :inline="true" :model="filters">
        <el-form-item>
          <el-input v-model="filters.name" placeholder="请输入....."></el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" icon="search" >查询</el-button>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="handleAdd">新增</el-button>
        </el-form-item>
      </el-form>
    </el-col>
        <!-- 列表 -->
        <el-table 
          :data="tableData" 
          stripe 
          style="width: 100%;"
         
          @selection-change="selsChange" 
          :default-sort = "{prop: 'date', order: 'descending'}">
          <el-table-column type="selection" width="55"></el-table-column>
          <el-table-column sortable prop="id" label="编号"></el-table-column>
          <el-table-column sortable prop="name" label="姓名"></el-table-column>
          <el-table-column sortable prop="ticket" label="班级"></el-table-column>
          <el-table-column sortable prop="stage_id" label="手机号"></el-table-column>
          <el-table-column prop="edit" label="操作">
            <template scope="scope">
              <el-button type="primary" icon="edit" size="mini" @click="handleEdit(scope.$index, scope.row)"></el-button>
              <el-button type="danger" icon="delete" size="mini" @click="handleDelete(scope.$index, scope.row)"></el-button>
            </template>
          </el-table-column>
        </el-table>
        
        <!--批量删除 与 分页-->
        <el-col :span="24" class="toolbar" style="margin-top:2%;">
          <el-button type="danger" :disabled="this.sels.length===0">批量删除</el-button>
          <el-pagination
            style="float:right;"
            @size-change="handleSizeChange"
            @current-change="handleCurrentChange"
            :current-page="currentPage"
            :page-sizes="[10, 20, 30, 50]"
            :page-size="10"
            layout="total, sizes, prev, pager, next, jumper"
            :total="total">
          </el-pagination>
        </el-col>

        <!-- 编辑 -->
        <el-dialog title="编辑" v-model="editFormVisible" :close-on-click-modal="false">
          <el-form :model="editForm" :rules="editFormRules" ref="editForm">
            <el-form-item label="编号">
              <el-input v-model="editForm.id" disabled auto-complete="off"></el-input>
            </el-form-item>
            <el-form-item label="姓名" prop="name">
              <el-input v-model="editForm.name" auto-complete="off"></el-input>
            </el-form-item>
          </el-form>
          <div slot="footer" class="dialog-footer">
            <el-button @click.native="editFormVisible = false">取 消</el-button>
            <el-button type="primary" @click="editFormVisible = false">提 交</el-button>
          </div>
        </el-dialog>
    </div>
</template>

<script>
    export default {
        data() {
          return {
            imageUrl: '',
            activeIndex: '1',
            tableData: [],
            listLoading: false,
            editFormVisible: false,//编辑界面显示
            editFormRules: {
              name: [
                { required: true, message: '请输入姓名', trigger: 'blur' }
              ]
            },
            header: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="X-CSRF-TOKEN"]').content,
            },
            //编辑界面数据
            editForm: {
              id: 0,
              name: '',
            },
            addFormVisible: false,//新增界面显示
            //新增界面数据
            addVideoDisabled: false,
            addForm: {
              name: '',
            },
            // formLabelWidth: '80px',//
            editId: null,
            total: 0,
            page: 1,
            sels: [],
            filters: {
              name: ''
            },
            currentPage: 1,
            addFormRules: {
              name: [
                { required: true, message: '请输入名字', trigger: 'blur' },
                { min: 2, max: 7, message: '长度在 2 到 7 个字符', trigger: 'blur' }
              ],              
            }
          }
        },
        methods: {
          //看log
          handleSizeChange(val) {
            console.log(`每页 ${val} 条`);
          },
          //看log
          handleCurrentChange(val) {
            this.page = val;
            this.getTable();
            console.log(`当前页: ${val}`);
          },
          //批量删除 标记
          selsChange: function (sels) {
            this.sels = sels;
          },
          //
          handleSelect(key, keyPath) {
            console.log(key, keyPath);
          },
          //模态框消失
          handleClose(done) {
            done();
          },
          //新增界面显示
          handleAdd: function(){
            this.addFormVisible = true;
          },
          //新增提交按钮
          addSubmit: function(formName){
            var vue=this;
            this.$refs[formName].validate((valid) => {
              if (valid) {
                this.$nextTick(function () {
                    axios.post('/admin/index/addPlayer', {
                        player: vue.addForm
                    })
                    .then(function (response) {
                        if(response.data.code==1){
                            vue.$message({
                                type:"success",
                                message: response.data.msg,
                            });
                        }else{
                            vue.$message.error(response.data.msg);
                        }
                        vue.addFormVisible=false;
                        var player=vue.addForm;
                        player.id=response.data.id;
                        player.ticket=0;
                        vue.tableData.push(player);
                    })
                    .catch(function (response) {

                    });
                })
              } else {
                console.log('error submit!!');
                return false;
              }
            });
          },

//=======================分割线===================================

          //显示编辑界面
          handleEdit: function (index, row) {
            this.editFormVisible = true;
            this.editForm = Object.assign({}, row);
          },
          //删除
          handleDelete:  function (index, row) {
            this.$confirm('确认删除该记录吗?', '提示', {
              type: 'warning'
            }).then(() => {       
                var vue=this;
                this.$nextTick(function () {
                    axios.post('/admin/delete', {
                        id:row.id
                    })
                    .then(function (response) {
                        if(response.data.code==1){
                            vue.$message({
                                type:"success",
                                message: response.data.msg,
                            });
                        }else{
                            vue.$message.error(response.data.msg);
                        }
                        vue.tableData.splice(index,1);
                    })
                    .catch(function (response) {
                        console.log(response);
                    });
                })
            }).catch(() => {
            });        
          },
          //获取列表
          getTable: function() {
            var vue=this;
            this.$nextTick(function () {
              vue.listLoading = true;
                axios.post('/admin/index', {})
                .then(function (response) {
                    vue.total = response.data.total;
                    vue.tableData = response.data;
                    vue.listLoading = false;
                })
                .catch(function (response) {
                    console.log(response);
                });
            })
          },
        },
        //加载页面请求数据
        mounted: function(){
          this.getTable();
        }
  }
</script>

<style>
  .avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .avatar-uploader .el-upload:hover {
    border-color: #20a0ff;
  }
  .avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 100px;
    text-align: center;
  }
  #uploadImage .el-upload-list__item{
    width: 60px !important;
    height: 60px !important;
  }
  #uploadImage .el-upload--picture-card{
    width: 60px !important;
    height: 60px !important;
    line-height:70px !important;
  }
  #uploadVideoImg .el-upload-list__item{
    width: 300px !important;
  }
  #uploadVideoImg .el-upload--picture-card{
    width: 300px !important;
  }
  .avatar {
    width: 178px;
    height: 178px;
    display: block;
  }
  .el-dialog--tiny{
    width: auto !important;
  }
  .el-table__body-wrapper{
    overflow: hidden !important;
  }
</style>