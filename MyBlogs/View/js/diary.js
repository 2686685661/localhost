/**
 * Created by lishanlei on 17-5-5.
 */
// window.onload = function () {
//     var aj = $.ajax({
//         'data':{
//             'surfacename':"diary"
//         },
//         'type':'post',
//         'url':'/MyBlogs/index.php/Admin/getDiary',
//         'dataType':'json',
//         success:function (data) {
//             // var id=1;
//             data.data.forEach(function (content) {
//                 var Adiary = '<tr>';
//                 Adiary += '<td>'+content['id']+'</td>';
//                 Adiary += '<td>'+content['diarytime']+'</td>';
//                 Adiary += '<td>'+content['diarycontent']+'</td>';
//                 Adiary += "<td><button>修改</button><button>删除</button></td>";
//                 Adiary += '</tr>';
//                 $("#diarybody").append(Adiary);
//             });
//         }
//     });
// }


function modifyDiary(ue) {
    window.location.href="/MyBlogs/index.php/Admin/modifydiary?id="+ue;
}

function modifyartical(ue) {
    window.location.href="/MyBlogs/index.php/Admin/modifyartical?id="+ue;
}

function lookartical(ue) {
    window.location.href="/MyBlogs/index.php/Admin/rectheartical?id="+ue;
}

function replymessage(ue) {
    window.location.href="/MyBlogs/index.php/Admin/replymessage?id="+ue;
}


function deletearticle(ue) {
    $.ajax({
        data:{
            'name':'artical',
            'diaryid':ue
        },
        'type':'post',
        'url':'/MyBlogs/index.php/modifyMy/deletediary',
        'dataType':'json',
        success:function (data) {
            if(data) {
                window.location.href="/MyBlogs/index.php/Admin/articalmy";
            }
        }


    });
}


function deletemessage(ue) {
    $.ajax({
        data:{
            'name':'leavingMessage',
            'diaryid':ue
        },
        type:'post',
        url:'/MyBlogs/index.php/modifyMy/deletediary',
        dataType:'json',
        success:function (data) {
            if(data) {
                window.location.href="/MyBlogs/index.php/Admin/messagemy";
            }else {
                alert("留言删除失败");
            }
        }
    });
}


function deleteDiary(ue) {

    var aj = $.ajax({
        'data':{
            'name':'diary',
            'diaryid':ue
        },
        'type':'post',
        'url':'/MyBlogs/index.php/modifyMy/deletediary',
        'dataType':'json',
        success:function (data) {
            if(data) {
                window.location.href="/MyBlogs/index.php/Admin/diarymy";
            }else {
                alert("删除日记失败");
            }
        }
    });
}

function deletepicture(ue,picturenam) {

    var aj = $.ajax({
        'data':{
            'name':'picture',
            'diaryid':ue
        },
        'type':'post',
        'url':'/MyBlogs/index.php/modifyMy/deletediary',
        'dataType':'json',
    });

    var ajax = $.ajax({
        'data':{
            'filename':picturenam
        },
        'type':'post',
        'url':'/MyBlogs/index.php/getfile/deletefile',
        'dataType':'json',
    });

    window.location.href="/MyBlogs/index.php/Admin/picturemy";
}
