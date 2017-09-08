/**
 * Created by lishanlei on 17-5-4.
 */

$(function () {
    var ue = UE.getEditor('article');
});

window.onload = function () {
    var aj = $.ajax({
        'data':{
            'surfacename':"articleType"
        },
        'type':'post',
        'url':'/MyBlogs/index.php/modifyMy/getmy',
        'dataType':'json',
        success:function (data) {

            data.data.forEach(function (content) {
                $("#groupbtn").append('<li><a>'+content['arTy']+'</a></li>');
                // $("#groupbtn").append('<li class="divider"></li>')
            });
            inpAssignment();
        },
        // error:function () {
        //     alert("异常");
        // }
    });
}

function inpAssignment() {

    var groupbtn = document.getElementById('groupbtn');
    var groupbtns = groupbtn.getElementsByTagName('li');
    var inpbtn = document.getElementById('inpbtn');

    for(var i = 0; i < groupbtns.length; i++) {
        (function (e) {
            groupbtns[e].onclick = function () {
                var btn = groupbtns[e].innerText;
                inpbtn.value = btn;
            }
        })(i)
    }
}

// function newartical() {
//     var  imgurl = $("#img").val();
//     $.ajax({
//         data:{
//             'articalpicture':imgurl
//         },
//         'type':'post',
//         'dataType':'json',
//         'url':'/MyBlogs/Controller/arupload.php'
//     });
//     var formdata = new FormData($("#forms")[0]);
//     var articletype = formdata.get("articletype");
//     var headline = formdata.get("headline");
//     var articalcontent = formdata.get("articalcontent");
//
//     $.ajax({
//         data:{
//             'articletype':articletype,
//             'imgurl':imgurl,
//             'headline':headline,
//             'articalcontent':articalcontent
//         },
//         'type':'post',
//         'dataType':'json',
//         'url':'/MyBlogs/index.php/modifyMy/newarticle',
//
//     });
//
// }

// //根据不同浏览器获取路径
// function getvl(obj){
// //判断浏览器
//     var Sys = {};
//     var ua = navigator.userAgent.toLowerCase();
//     var s;
//     (s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] :
//         (s = ua.match(/firefox\/([\d.]+)/)) ? Sys.firefox = s[1] :
//             (s = ua.match(/chrome\/([\d.]+)/)) ? Sys.chrome = s[1] :
//                 (s = ua.match(/opera.([\d.]+)/)) ? Sys.opera = s[1] :
//                     (s = ua.match(/version\/([\d.]+).*safari/)) ? Sys.safari = s[1] : 0;
//     var file_url="";
//     if(Sys.ie<="6.0"){
//         //ie5.5,ie6.0
//         file_url = obj.value;
//     }else if(Sys.ie>="7.0"){
//         //ie7,ie8
//         obj.select();
//         obj.blur();
//         file_url = document.selection.createRange().text;
//     }else if(Sys.firefox){
//         //fx
//         //file_url = document.getElementById("file").files[0].getAsDataURL();//获取的路径为FF识别的加密字符串
//         file_url = readFileFirefox(obj);
//     }else if(Sys.chrome){
//         file_url = obj.value;
//     }
//     //alert(file_url);
//     alert("获取文件域完整路径为："+file_url);
// }
