var uri = window.location.search;
console.log(uri);
var getvague = uri.substring(7);
var getvagueutf = decodeURI(getvague);
// alert(getvagueutf);
var aj = $.ajax({
    data:{
        'vague':getvagueutf
    },
    type:'post',
    url:' /MyBlogs/index.php/modifyMy/vagueselect',
    dataType:'json',
    success:function (data) {

        $("#aboutContent").html(data);
    }
});
