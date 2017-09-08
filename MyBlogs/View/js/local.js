// var xmlhttp;
// function loadXMLDoc(n) {
//
//     if(window.XMLHttpRequest) {
//         xmlhttp = new XMLHttpRequest();
//     }
//     else if (window.ActiveXObject) {
//         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//     }
//
//     xmlhttp.onreadystatechange = function () {
//         if(xmlhttp.readyState == 4 && xmlhttp.Status == 200) {
//             document.getElementById("page-wrapper").innerHTML=xmlhttp.responseText;
//         }
//     }
//
//     if(n==5) {
//         // $("5").removeClass("active-menu");
//
//         xmlhttp.open("get","/MyBlogs/index.php/Admin/local?parms=5",true);
//         // alert("aaaaaa");
//         xmlhttp.setRequestHeader("X-Requested-With","AJAX");
//         xmlhttp.send();
//     }
//
// }
$(function () {
    $.ajax({
        'type':'post',
        'url':'/MyBlogs/index.php/Admin/local',

        success:function (data) {
            if(data){
                $("#page-nav").html(data);
            }
        }
    });
});

// $("#dateone").click(function () {
//     var ah = $.ajax({
//         'data':{
//             'surfacename':"personal"
//         },
//         'type':'post',
//         'url':'/MyBlogs/index.php/Admin/getmy',
//         'dataType':'json',
//         success:function (data) {
//             $("#bodyone").html("");
//             data.data.forEach(function (content,index) {
//                 $("#bodyone").append('<div class="body-wrap" id="body-'+index+'"></div>')
//             });
//             data.data.forEach(function (content,index) {
//                 var boin = "#body-"+index;
//                 $("#bodyone").find(boin).append('<h2>姓名: '+content['myName']+'</h2>')
//                 $("#bodyone").find(boin).append('<h2>我的QQ: '+content['qq']+'</h2>')
//                 $("#bodyone").find(boin).append('<h2>我的职业: '+content['myWork']+'</h2>')
//                 $("#bodyone").find(boin).append('<h2>我的兴趣: '+content['myHobby']+'</h2>')
//                 $("#bodyone").find(boin).append('<h3>我的简介: '+content['myExplain']+'</h3>')
//             });
//         },
//         error:function () {
//             alert("异常");
//         }
//     });
// });



