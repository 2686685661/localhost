/**
 * 刷新验证码
 * @param obj
 * @param url
 */
function newgdcode(obj,url){
    obj.src = url+"?nowtime=" + new Date().getTime();
}

$(document).ready(function () {
    $("#submit").click(function () {

        var name = $.trim($("#name").val());
        var password = $.trim($("#password").val());
        var confirmpassword = $.trim($("#confirmpassword").val());
        var code = $.trim($("#code").val());

        $.ajax({
            type:"POST",
            url:"/MyWeb/Enroll/subEnroll",
            data:{
                name :name,
                password :password,
                confirmpassword :confirmpassword,
                code :code,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    alert(data.msg);

                    window.location.href="/MyWeb/Admin/home";

                }else {
                    alert(data.msg);
                    $('#code-img').click();
                }

            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });
});