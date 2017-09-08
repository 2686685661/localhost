/**
 * Created by lishanlei on 17-5-6.
 */

var uri = window.location.search;
var getid = uri.substring(4);


var aj = $.ajax({

    data:{
        'name':"artical",
        'diaryid':getid
    },
    type:'post',
    url:' /MyBlogs/index.php/modifyMy/returndiary',
    dataType:'json',
    success:function (data) {
        data.data.forEach(function (content) {
            var inpbtn = document.getElementById('inpbtn');
            var head = document.getElementById('head');
            var article = document.getElementById('article');
            if(content['artyid']==1){
                inpbtn.value = "学苑天地";
            }else if(content['artyid']==2) {
                inpbtn.value = "心灵旅程";
            }
            head.value = content['headline'];
            article.value = content['articalcontent'];
        });
    }
});

function former() {
    var formdata = new FormData($("#forms")[0]);

    var articletype = formdata.get("articletype");
    var headline = formdata.get("headline");
    var articalcontent = formdata.get("articalcontent");
    $.ajax({

        url:'/MyBlogs/index.php/modifyMy/modifyartical',
        type:'post',
        data:{
            'id':getid,
            'articletype':articletype,
            'headline':headline,
            'articalcontent':articalcontent
        },
        'dataType':'json',
        success:function (data) {
            if(data)
                window.location.href="/MyBlogs/index.php/Admin/articalmy";
            else
                alert("修改文章失败");
        }

    });

}