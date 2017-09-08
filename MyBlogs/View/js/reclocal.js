/**
 * Created by lishanlei on 17-5-11.
 */
$(function () {
    $.ajax({
        type:'post',
        url:'/MyBlogs/index.php/Admin/recheader',
        success:function (data) {
            if(data) {
                $("#pblicReception").html(data);
            }
        }
    });
});


function clickvague() {
    var vague = document.getElementById('vague');
    var vag=vague.value;
    window.location.href="/MyBlogs/index.php/Admin/vagueartical?vague="+vag;
}