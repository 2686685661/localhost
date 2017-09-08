/**
 * 导航栏
 * @type {number}
 */
var is_show = 0;
function show_ul_ul(num) {

    var navs = document.getElementById('nav-ul').getElementsByTagName('li');
    for (var v = 0; v < navs.length; v++){
        navs[v].className = 'show-ul-ul';
    }

    if(is_show != num){
        navs[num].className = '';
        is_show = num;
    }else{
        is_show = 0;
    }
}

function changeBg(obj) {

    var ishs = getElementsByClass('ish CGBG');
    for(var v = 0; v < ishs.length; v++){
        ishs[v].className = 'ish';
    }

    obj.className = 'ish CGBG';

}

/**
 * 异步处理
 */
$(document).ready(function () {

    /**
     * 点击用户自己
     */
    $("#userData").click(function () {
        $.ajax({
            type:"POST",
            url:"/MyWeb/UserInformation/userData",
            data:{

            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#parts").empty();

                    $("#parts").append(data.data);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    /**
     * 修改用户资料页面
     */
    $("#resetUserData").click(function () {

        changeBg(this);

        $.ajax({
            type:"POST",
            url:"/MyWeb/UserInformation/resetUserData",
            data:{

            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#parts").empty();

                    $("#parts").append(data.data);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });
    /**
     * 点击修改用户资料
     */
    $("#parts").on("click","#setData",function () {

        $('#resetUserData').click();

    });


    /**
     * 修改
     */
    $("#parts").on("click","#sub",function () {

        var formData = new FormData($("#setUserData")[0]);

        $.ajax({
            type:"POST",
            url:"/MyWeb/UserInformation/setUserData",
            data:formData,
            processData:false,
            contentType:false,
            dataType:"json",
            cache:false,
            success:function (data) {

                if(data.code == 1){
                    alert(data.msg);
                }else{
                    alert(data.msg);
                }

            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    /**
     * 账户安全
     */
    $("#security").click(function () {

        changeBg(this);

        $.ajax({
            type:"POST",
            url:"/MyWeb/UserInformation/security",
            data:{

            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#parts").empty();

                    $("#parts").append(data.data);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    /**
     * 密保 答案 更新密码页面
     */
    $("#parts").on("click","#security-sub",function () {

        $.ajax({
            type:"POST",
            url:"/MyWeb/UserInformation/findById",
            data:{
                password:$("#security-password").val(),
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#parts").empty();

                    $("#parts").append(data.data);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    /**
     * 更新密保 答案 密码
     */
    $("#parts").on("click","#replace-sub",function () {

        var formData = new FormData($("#replace")[0]);

        $.ajax({
            type:"POST",
            url:"/MyWeb/UserInformation/replaceSecurityData",
            data:formData,
            processData:false,
            contentType:false,
            dataType:"json",
            cache:false,
            success:function (data) {
                if(data.code == 1){
                    alert(data.msg);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });


    /**
     * 添加文章页面
     */
    $("#addEssay").click(function () {

        changeBg(this);

        $.ajax({
            type:"POST",
            url:"/MyWeb/Essay/addEssay",
            data:{

            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#parts").empty();

                    $("#parts").append(data.data);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    /**
     *添加文章
     */
    $("#parts").on("click","#add",function () {

        var formData = new FormData($("#addform")[0]);

        $.ajax({
            type:"POST",
            url:"/MyWeb/Essay/addEssays",
            data:formData,
            processData:false,
            contentType:false,
            dataType:"json",
            cache:false,
            success:function (data) {
                if(data.code == 1){
                    alert(data.msg);

                    $("#addEssay").click();
                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    /**
     * 模糊搜索文章
     */
    $("#parts").on("click","#vagueSearchEssay",function () {

        $value = $("#vagueSearchValue").val();

        $.ajax({
            type:"POST",
            url:"/MyWeb/Essay/vagueSearchEssay",
            data:{
                search:$value,
                methodName :'vagueSearchEssay',
                page :1,
            },
            dataType:"json",
            success:function (data) {

                if(data.code == 1){

                    $("#parts").empty();

                    $.each(data.data,function(i,item){

                        $("#parts").append(item);

                    });

                }else{
                    alert(data.msg);
                }

            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    /**
     * 文章
     */
    $("#allEssay").click(function () {

        changeBg(this);

        $.ajax({
            type:"POST",
            url:"/MyWeb/Essay/allEssay",
            data:{
                methodName :'allEssay',
                page :1,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#parts").empty();

                    $.each(data.data,function(i,item){

                        $("#parts").append(item);

                    });

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });

    });


    /**
     *修改文章
     */
    $("#parts").on("click","#edit",function () {

        var formData = new FormData($("#addform")[0]);

        $.ajax({
            type:"POST",
            url:"/MyWeb/Essay/editEssays",
            data:formData,
            processData:false,
            contentType:false,
            dataType:"json",
            cache:false,
            success:function (data) {

                if(data.code == 1){
                    alert(data.msg);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    /**
     * 得到上传图片的页面
     */
    $("#addPhoto").click(function () {

        changeBg(this);

        $.ajax({
            type:"POST",
            url:"/MyWeb/Photo/uploadPhoto",
            data:{

            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#parts").empty();

                    $("#parts").append(data.data);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    /**
     *上传图片
     */
    $("#parts").on("click","#photo-sub",function () {

        var formData = new FormData($("#upPhotoForm")[0]);

        $.ajax({
            type:"POST",
            url:"/MyWeb/Photo/receivePhoto",
            data:formData,
            processData:false,
            contentType:false,
            dataType:"json",
            cache:false,
            success:function (data) {

                if(data.code == 1){

                    alert(data.msg);

                }else{

                    var errors = null;

                    $.each(data.msg,function(i,item){

                        errors = errors + i + ":" + item + '\n';

                    });

                    alert(errors);

                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    /**
     * 查看所有图片
     */
    $("#allPhoto").click(function () {

        changeBg(this);

        $.ajax({
            type:"POST",
            url:"/MyWeb/Photo/selectPhotos",
            data:{
                methodName :'allphoto',
                page :1,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#parts").empty();

                    $("#parts").append(data.data);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    /**
     * 游客资料
     */
    $("#searchEnroll").click(function () {

        changeBg(this);

        $.ajax({
            type:"POST",
            url:"/MyWeb/Enroll/searchEnroll",
            data:{
                methodName :'searchEnroll',
                page :1,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#parts").empty();

                    $.each(data.data,function(i,item){

                        $("#parts").append(item);

                    });

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });

    });

});

/**
 * 编辑文章
 * @param id
 */
function editEssay(id) {

    $.ajax({
        type:"POST",
        url:"/MyWeb/Essay/editEssay",
        data:{
            id :id,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){
                $("#parts").empty();

                $("#parts").append(data.data);
            }else{
                alert(data.msg);
            }
        },
        error:function (jqXHR) {
            alert("发生错误：" + jqXHR.status);
        }
    });

}

/**
 * 删除文章
 * @param id
 */
function deleteEssay(id) {

    if(confirm('一定要删除我吗？_？')){

        //删除文章
        $.ajax({
            type:"POST",
            url:"/MyWeb/Essay/deleteEssay",
            data:{
                id :id,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){
                    alert(data.msg);

                    $('#allEssay').click();

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });

        //删除文章有关的评论
        $.ajax({
            type:"POST",
            url:"/MyWeb/Comment/delComment",
            data:{
                essayid :id,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });

    }

}

/**
 * 删除游客
 * @param id
 */
function delEnroll(id) {

    $.ajax({
        type:"POST",
        url:"/MyWeb/Enroll/delEnroll",
        data:{
            id :id,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){
                alert(data.msg);

                $('#searchEnroll').click();

            }else{
                alert(data.msg);
            }
        },
        error:function (jqXHR) {
            alert("发生错误：" + jqXHR.status);
        }
    });

}
/**
 *文章分页
 * @param index
 */
function allEssay(index) {

    var page = index;

    if(index == 'go'){

        page = $("#allEssayGO").val();

    }

    $.ajax({
        type:"POST",
        url:"/MyWeb/Essay/allEssay",
        data:{
            methodName :'allEssay',
            page :page,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){

                $("#parts").empty();

                $.each(data.data,function(i,item){

                    $("#parts").append(item);

                });

            }else{
                alert(data.msg);
            }
        },
        error:function (jqXHR) {
            alert("发生错误：" + jqXHR.status);
        }
    });

}

/**
 *模糊查询文章分页
 * @param index
 */
function vagueSearchEssay(index) {

    var page = index;

    if(index == 'go'){

        page = $("#vagueSearchEssayGO").val();

    }

    $.ajax({
        type:"POST",
        url:"/MyWeb/Essay/vagueSearchEssay",
        data:{
            methodName :'vagueSearchEssay',
            page :page,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){

                $("#parts").empty();

                $.each(data.data,function(i,item){

                    $("#parts").append(item);

                });

            }else{
                alert(data.msg);
            }
        },
        error:function (jqXHR) {
            alert("发生错误：" + jqXHR.status);
        }
    });

}

/**
 *游客分页
 * @param index
 */
function searchEnroll(index) {

    var page = index;

    if(index == 'go'){

        page = $("#searchEnrollGO").val();

    }

    $.ajax({
        type:"POST",
        url:"/MyWeb/Enroll/searchEnroll",
        data:{
            methodName :'searchEnroll',
            page :page,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){

                $("#parts").empty();

                $.each(data.data,function(i,item){

                    $("#parts").append(item);

                });

            }else{
                alert(data.msg);
            }
        },
        error:function (jqXHR) {
            alert("发生错误：" + jqXHR.status);
        }
    });

}
/**
 * 图片分页
 * @param index
 */
function allphoto(index) {

    var page = index;

    if(index == 'go'){

        page = $("#allphotoGO").val();

    }

    $.ajax({
        type:"POST",
        url:"/MyWeb/Photo/selectPhotos",
        data:{
            methodName :'allphoto',
            page :page,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){

                $("#parts").empty();

                $.each(data.data,function(i,item){

                    $("#parts").append(item);

                });

            }else{
                alert(data.msg);
            }
        },
        error:function (jqXHR) {
            alert("发生错误：" + jqXHR.status);
        }
    });

}

/**
 * 删除图片
 * @param id
 */
function deimg(id) {

    if(confirm('一定要删除我吗？_？')){

        $.ajax({
            type:"POST",
            url:"/MyWeb/Photo/deimg",
            data:{
                id :id,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    alert(data.msg);

                    var mypage = $("#mypage").html();

                    allphoto(mypage);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });

    }

}