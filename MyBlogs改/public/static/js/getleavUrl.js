/**
 * Created by lishanlei on 17-5-14.
 */
var uri = window.location.search;
var getid = uri.substring(4);

var aj = $.ajax({
    data:{
        'name':'leavingMessage',
        'diaryid':getid
    },
    type:'post',
    url:' /MyBlogs/index.php/modifyMy/returndiary',
    dataType:'json',
    success:function (data) {
        data.data.forEach(function (content) {
            var leavingmessage = document.getElementById('leavingmessage');
            var replymessage = document.getElementById('replymessage');
            replymessage.innerText = content['replytext'];
            leavingmessage.innerText = content['leavtext'];
            // $("#leavingmessage").attr("innerText",content['leavtext']);
            // $("#replymessage").attr("innerText",content['replytext']);
        });
    }
});

function reply() {

    var formdata = new FormData($("#reply")[0]);
    var replytext = formdata.get("explain");
    $.ajax({
        data:{
            'id':getid,
            'replytext':replytext
        },
        type:'post',
        url:'/MyBlogs/index.php/modifyMy/replyleaving',
        dataType:'json',
        success:function (data) {
            alert("aaaaaaaaaaa");
            if(data) {
                window.location.href="/MyBlogs/index.php/Admin/messagemy";
            }else {
                alert("留言回复失败");
            }
        }
    });

}