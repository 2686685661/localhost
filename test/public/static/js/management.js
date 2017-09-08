

var timeout = false;

$(function(){
    var ue=UE.getEditor('article');
    var bt=document.getElementById("bt");
    var articlelist=document.getElementById("articlelist");
    var articleForm =document.getElementById("articleform");

    selectarticle(ue);

    $("#updatesub").attr("disabled",true);
    $("#addsub").attr("disabled",true);

    $("#addarticle").click(function(){
        ue.setContent("");
        $("#title").val("");
        $("#img").val("");
        bt.innerHTML="发表文章";
        $("#addsub").attr("disabled",false);
        timeout=true;
    });

    $("#selectarticle").click(function(){
         bt.innerHTML="查询文章";
         selectarticle(ue);
         ue.setContent("");
        $("#title").val("");
        $("#img").val("");
        timeout=true;
    });

    $("#addsub").click(function(){
         addartice(ue);
    });

    $("#updatesub").click(function(){
        updatearticle(0,2);
    });

});

function addartice(ue){
    
        var title=$("#title").val();
        var article =ue.getContent();
        var img=$("#img").val();

        $.post("/test/index.php/Article/add",{'title':title,'article':article,'img':img},function(data){

            if(data==1){
                alert("添加成功");
                ue.setContent("");
                $("#title").val("");
                $("#img").val("");
            }
            else if(data==0){
                alert("添加失败");
            }
        })
}




function deletearticle(id){

    $.post("/test/index.php/Article/delete",{'id':id},function(data){

    if(data==1){
        alert("删除成功");
        location.reload();
    }
    else if(data==0){
        alert("删除失败");
    }
})
}

var backupsTitle,backupsContent,backupsImg;
function selectonlyarticle(id,choice){
    $("#updatesub").attr("disabled",true);
    $("#addsub").attr("disabled",true);

    var ue=UE.getEditor('article');

    $.post("/test/index.php/Article/selectonly",{'id':id},function(data){
        if(data){
            var str = eval(data);            
             $("#title").val(str[0][0]);
             ue.setContent(str[0][1]);
             $("#imgg").val(str[0][2]);

            backupsTitle=$("#title").val();
            backupsContent=ue.getContent();
            backupsImg=$("#imgg").val();
        }
        else{
            alert("xxx");
        }
    })
    timeout=false;
    time();
    updatearticle(id,1);
}


function time()
{  
    if(timeout) return; 
    var ue=UE.getEditor('article');
     if(backupsTitle==$("#title").val()&&backupsContent==ue.getContent()&&backupsImg==$("#imgg").val()){
            $("#updatesub").attr("disabled",true);
            console.log("a");
        }
        else{
            $("#updatesub").attr("disabled",false);
            console.log("b");
        }
    setTimeout(time,100);   
}  




function selectarticle(ue){
    $.post("/test/index.php/Article/select",function(data){
        if(data){
            var str = eval(data);
            var obj;
            var ss="";
            var obj=document.getElementById("aaaaaa");
            var j;
            for(var i=0;i<str.length;i++){
                j=1;
                ss+="<tr>";
                    ss+="<td>"+str[i][j++]+"</td>";
                    ss+="<td>"+getLocalTime(str[i][j++])+"</td>";
                    ss+="<td>"+getLocalTime(str[i][j++])+"</td>";
                    ss+="<td>"+str[i][j]+"</td>";
                    ss+='<td><a href="#articleform" data-toggle="tab"'+'onclick="selectonlyarticle('+str[i][0]+","+1+')">S</a>,'
                    // ss+='<a href="#articleform" data-toggle="tab"'+'onclick="selectonlyarticle('+str[i][0]+","+2+')">U</a>,'
                    ss+='<a href="javascript:;"'+'onclick="deletearticle('+str[i][0]+')">D</a></td>';
                ss+="</tr>";
            }
            obj.innerHTML=ss;
        }
        else{
            alert("xxxxxx");
        }
    })
}

var updateId;
function updatearticle(id,yes){
    
    if(yes==1){
        updateId=id;
    }else if(yes==2){
        
        var ue=UE.getEditor('article');
        var title=$("#title").val();
        var article =ue.getContent();
        var img=$("#img").val();

        $.post("/test/index.php/Article/update",{'id':updateId,'title':title,'article':article,'img':img},function(data){
            
            if(data==2){
                alert("成功");
                
                timeout=true;
                $("#updatesub").attr("disabled",true);
            }
            else{
                alert("xxx");
            }

        })
        
    }

}


function getLocalTime(nS) {
    return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
}