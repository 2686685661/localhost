/**
 * Created by lishanlei on 17-5-16.
 */

function denglu() {
    var formdata = new FormData($("#Form")[0]);
    var account= formdata.get("account");
    var password = formdata.get("password");
    var code = formdata.get("code");

    $.ajax({
        'data':{
            'account':account,
            'password':password,
            'code':code
        },
        'type':'post',
        'url':'/MyBlogs/index.php/login/islogin',
        'dataType':'json',
        success:function (data) {

            if(data==0) {
                var emptyUser = document.getElementById('emptyUser');
                emptyUser.style.opacity = 1;
            }else if(data==1) {
                var emptyPassword = document.getElementById('emptyPassword');
                emptyPassword.style.opacity = 1;
            }else if(data==2) {
                alert("验证码为空");
            }else if(data==3) {
                alert("验证码错误");
            }else if(data==4) {
                var inexistenceUser = document.getElementById('inexistenceUser');
                inexistenceUser.style.opacity = 1;
            }else if(data==5) {
                var mistakePassword = document.getElementById('mistakePassword');
                mistakePassword.style.opacity = 1;
            }else if(data==6) {
                window.location.href="/MyBlogs/index.php/Admin/backManage";
            }else if(data==7) {
                window.location.href="/MyBlogs/index.php/Admin/backManage";
            }
        }


     });

}

function keywordfocus(input) {
    var divinput = input.parentNode;
    var labelSpan = divinput.getElementsByTagName('span');
    for(var i=0;i<labelSpan.length;i++) {
        if(labelSpan[i].className=='formli-input-warning' && labelSpan[i].style.opacity==1) {
            labelSpan[i].style.opacity=0;
        }
    }

    
}
