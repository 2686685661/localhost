var uri = window.location.search;
var getvague = uri.substring(4);
alert(getvague);
var aj = $.ajax({
    data:{
        'vague':getvague
    },
    type:'post',
    url:' /MyBlogs/index.php/modifyMy/vagueselect',
    dataType:'json',
    success:function (data) {

        $("#aboutContent").html(data);
    }
});
