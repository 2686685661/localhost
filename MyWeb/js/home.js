/**
 * 通过like获取标签
 */
function getElementsByLike(classnames){
    var classobj= [];

    var classint=0;

    var tags=document.getElementsByTagName("*");

    for(var i in tags){

        if(tags[i].nodeType==1){

            if(tags[i].getAttribute("like") == classnames)

            {

                classobj[classint]=tags[i];

                classint++;

            }

        }

    }

    return classobj;

}

/**
 * 切换模块
 * @param dom
 */
function changemould(dom) {

    var nav_modules = getElementsByLike('nav-module');

    for(var i = 0; i < nav_modules.length; i++){
        nav_modules[i].className = 'nav-a';
    }

    dom.className = 'nav-a click';

    var index = dom.getAttribute('index');

    var modules = getElementsByLike('module');

    for(var v = 0; v < modules.length; v++){
        modules[v].className = 'module';
    }

    modules[parseInt(index)].className = 'module on';

}

window.onload=function(){
    $("#home").click();
}


$(document).ready(function (){

    /**
     * 首页
     */
    $("#home").click(function () {

        changemould(this);
        //经典文章
        $.ajax({
            type:"POST",
            url:"/MyWeb/Essay/classicalEssay",
            data:{

            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#hot-essay").empty();

                    $("#hot-essay").append(data.data);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });

        //最新文章
        $.ajax({
            type:"POST",
            url:"/MyWeb/Essay/newEssay",
            data:{

            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#new-essay").empty();

                    $("#new-essay").append(data.data);

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
    $("#essay").click(function () {

        changemould(this);

        $.ajax({
            type:"POST",
            url:"/MyWeb/Essay/selectPageEssay",
            data:{
                methodName :'selectPageEssay',
                page :1,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#essay-module").empty();

                    $.each(data.data,function(i,item){

                        $("#essay-module").append(item);

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
     * 查看更多
     */
    $("#hot-essay").on("click","#hot-more",function () {

        $("#essay").click();

    });
    $("#new-essay").on("click","#new-more",function () {

        $("#essay").click();

    });

    /**
     * 模糊搜索文章
     */
    $("#essay-module").on("click","#vagueSearchEssay",function () {

        $value = $("#vagueSearchValue").val();

        $.ajax({
            type:"POST",
            url:"/MyWeb/Essay/vagueSearchEssay",
            data:{
                type:1,
                search:$value,
                methodName :'vagueSearchEssay',
                page :1,
            },
            dataType:"json",
            success:function (data) {

                if(data.code == 1){

                    $("#essay-module").empty();

                    $.each(data.data,function(i,item){

                        $("#essay-module").append(item);

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
     * 图片
     */
    $("#photo").click(function () {

        changemould(this);
        //经典文章
        $.ajax({
            type:"POST",
            url:"/MyWeb/Photo/selectPagePhotos",
            data:{
                methodName :'selectPagePhotos',
                page :1,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    $("#photo-module").empty();

                    $("#photo-module").append(data.data);

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
     * 秘密
     */
    $("#secret").click(function () {

        changemould(this);

    });

    /**
     * 文本展示区
     */
    $("#show-essay").click(function () {

        changemould(this);

    });

    /**
     * 发表评论
     */
    $("#pub-but").click(function () {

        //判断用户账号
        $name = $.trim($("#name").val());
        $password = $.trim($("#password").val());

        $.ajax({
            type:"POST",
            url:"/MyWeb/Enroll/find",
            data:{
                name:$name,
                password:$password,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    publish($name);

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
 * 评论
 */
function publish(name) {

    //添加评论
    $content = $.trim($("#publish-content").val());

    $id = $("#num")[0].getAttribute('index');   //文章id

    $.ajax({
        type:"POST",
        url:"/MyWeb/Comment/addComment",
        data:{
            id:$id,
            content:$content,
            visitorname:name,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){

                selectComment($id);
                $("#publish-content").val('');

            }else{
                alert(data.msg);
            }
        },
        error:function (jqXHR) {
            alert("发生错误：" + jqXHR.status);
        }
    });
    //刷新评论
    $.ajax({
        type:"POST",
        url:"/MyWeb/Essay/addComment",
        data:{
            id:$id,
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

/**
 * 文章全文
 * @param id
 */
function fullEssay(id) {

    $("#show-essay").click();
    //文章内容
    $.ajax({
        type:"POST",
        url:"/MyWeb/Essay/fullEssay",
        data:{
            id:id,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){

                $("#eaasy-content").empty();

                $("#eaasy-content").append(data.data);

            }else{
                alert(data.msg);
            }
        },
        error:function (jqXHR) {
            alert("发生错误：" + jqXHR.status);
        }
    });

    selectComment(id);

}


/**
 * 评论内容
 * @param id
 */
function selectComment(id) {

    $.ajax({
        type:"POST",
        url:"/MyWeb/Comment/selectComment",
        data:{
            id:id,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){

                $("#com").empty();

                $("#com").append(data.data);

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
 * 文章分页
 * @param index
 */
function selectPageEssay(index) {

    var page = index;

    if(index == 'go'){

        page = $("#selectPageEssayGO").val();

    }

    $.ajax({
        type:"POST",
        url:"/MyWeb/Essay/selectPageEssay",
        data:{
            methodName :'selectPageEssay',
            page :page,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){

                $("#essay-module").empty();

                $.each(data.data,function(i,item){

                    $("#essay-module").append(item);

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
 *模糊分页查询
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
            type:1,
            methodName :'vagueSearchEssay',
            page :page,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){

                $("#essay-module").empty();

                $.each(data.data,function(i,item){

                    $("#essay-module").append(item);

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
function selectPagePhotos(index) {

    var page = index;

    if(index == 'go'){

        page = $("#selectPagePhotosGO").val();

    }
    $.ajax({
        type:"POST",
        url:"/MyWeb/Photo/selectPagePhotos",
        data:{
            methodName :'selectPagePhotos',
            page :page,
        },
        dataType:"json",
        success:function (data) {
            if(data.code == 1){

                $("#photo-module").empty();

                $.each(data.data,function(i,item){

                    $("#photo-module").append(item);

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
