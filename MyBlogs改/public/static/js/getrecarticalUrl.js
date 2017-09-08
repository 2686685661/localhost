/**
 * Created by lishanlei on 17-5-13.
 */
var uri = window.location.search;
var getid = uri.substring(4);

var aj = $.ajax({
    data:{
        'name':'artical',
        'diaryid':getid
    },
    type:'post',
    url:' /MyBlogs/index.php/modifyMy/returndiary',
    dataType:'json',
    success:function (data) {
        data.data.forEach(function (content) {
            // $("#articalHeadline").attr("innerHTML",content['headline']);
            // $("#articalTime").attr("innerHTML",content['publishtime']);
            // $("#articalReadnumber").attr("innerHTML",content['readnumber']);
            // $("#publishperson").attr("innerHTML",content['publishperson']);
            // $("#articalContent").attr("innerHTML",content['articalcontent']);
            var articalHeadline = document.getElementById('articalHeadline');
            var articalTime = document.getElementById('articalTime');
            var articalReadnumber = document.getElementById('articalReadnumber');
            var articalPerson = document.getElementById('articalPerson');
            var articalContent = document.getElementById('articalContent');

            articalHeadline.innerHTML = content['headline'];
            articalTime.innerHTML = content['publishtime'];
            articalReadnumber.innerHTML = content['readnumber'];
            articalPerson.innerHTML = content['publishperson'];
            articalContent.innerHTML = content['articalcontent'];
        });
    }
});


var string = '';
var ajax = $.ajax({
    data:{
        'articalid':getid
    },
    type:'post',
    url:' /MyBlogs/index.php/modifyMy/selectcomment',
    dataType:'json',
    success:function (data) {
        console.log(data);
        $("#contow-box").html(data);
    }
});



function clickform(formid) {
    var formid = document.getElementById(formid);
    formid.style.display = 'block';
}



function submitcomment(pitchid) {
    var name = "commentname"+""+pitchid;
    var mailbox = "commentmailbox"+""+pitchid;
    var vomtext = "commenttext"+""+pitchid;

    var names = document.getElementById(name);
    var mails = document.getElementById(mailbox);
    var vomstext = document.getElementById(vomtext);
    var namevalue = names.value;
    var mailboxvalue = mails.value;
    var votextvalue = vomstext.value;
    var aj = $.ajax({
        data:{
            'articalid':getid,
            'namevalue':namevalue,
            'mailboxvalue':mailboxvalue,
            'votextvalue':votextvalue,
            'pitchid':pitchid
        },
        type:'post',
        dataType:'json',
        url:'/MyBlogs/index.php/modifyMy/newlycomment',
        success:function (data) {
            if(data) {
                window.location.href="/MyBlogs/index.php/Admin/rectheartical?id="+getid;
            }else {
                alert("评论失败");
            }

        }
    });
}

function submitcom() {
    var name = document.getElementById('name');
    var mailbox = document.getElementById('mailbox');
    var text = document.getElementById('text');
    var commentname = name.value;
    var commentmail = mailbox.value;
    var commenttext = text.value;
    $.ajax({
        data:{
            'pitchid':0,
            'articalid':getid,
            'namevalue':commentname,
            'mailboxvalue':commentmail,
            'votextvalue':commenttext
        },
        type:'post',
        dataType:'json',
        url:'/MyBlogs/index.php/modifyMy/newlycomment',
        success:function (data) {
            if(data) {
                window.location.href="/MyBlogs/index.php/Admin/rectheartical?id="+getid;
            }else {
                alert("留言失败");
            }

        }
    });
    
}