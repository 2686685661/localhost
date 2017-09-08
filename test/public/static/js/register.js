
$(function(){
    
    $("#submit-btn").click(function(){
        $username = $("#username").val();
        $password = $("#password").val();
        $data = {
            'username':$username,
            'password':$password
        };


        $.ajax({
            'type':'post',
            'url':'/test/index.php/Admin/login',
            'data':$data,
            success:function(data){
                if(data==1){
                    location.href = '/test/index.php/Admin/management';  
                }else{
                    alert("帐号或密码有误");
                }
            }
        });
    });


    $("#goback").click(function(){
        location.href="/test/index.php/Admin/my";
    });


});


