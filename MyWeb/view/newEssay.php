<?php

    foreach ($this->data as $sky => $value){
        echo   "<div class='NEW-MSG'>
                    <div class='new-essay-msg'>
                         <h3 class='new-msg-title'>{$value['title']}</h3>
                         <h4 class='new-msg-type'>类型：{$value['type']}</h4>
                         <h4 class='new-msg-author'>作者：{$value['author']}</h4>
                    </div>
                    <div class='msg-nav'>
                        <i>浏览量{$value['browse']}&nbsp;</i>
                        <i>评论{$value['comment']}</i>
                        <a class='full-text' href='javascript:fullEssay({$value['id']});'>阅读全文>></a>
                    </div>
                </div>";
    }
?>
<div class='view-more' id="new-more">查看更多</div>