/**
 * Created by lishanlei on 17-5-6.
 */


// window.onload = function () {

    var uri = window.location.search;
    var getid = uri.substring(4);
    var aj = $.ajax({
        data:{
            'name':"diary",
            'diaryid':getid
        },
        type:'post',
        url:' /MyBlogs/index.php/modifyMy/returndiary',
        dataType:'json',
        success:function (data) {
            data.data.forEach(function (content) {
                $("#modifytime").val(content['diarytime']);
                var modifysub = document.getElementById('modifysub');
                modifysub.innerText = content['diarycontent'];
            });
        }
    });

// }

function formes() {

    var formdata = new FormData($("#forms")[0]);
    var modifytime = formdata.get("diarydate");
    var modifysub = formdata.get("diarysubject");
    $.ajax({
        url:'/MyBlogs/index.php/modifyMy/modifydiary',
        type:'post',
        data:{
            'id':getid,
            'modifytime':modifytime,
            'modifysub':modifysub
        },
        'dataType':'json',
        success:function (data) {
            if(data) {
                window.location.href="/MyBlogs/index.php/Admin/diarymy";
            }else {
                alert("修改日记失败");
            }

        }




    });


}