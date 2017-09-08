<div style="text-align: right">
    <input type="text" id="vagueSearchValue">
    <input type="button" value="搜索" id="vagueSearchEssay">
</div>
<?php

foreach ($this->data as $value){

    echo   "<div class='MSG clearboth'>
                <div class='cover'>
                    <img src='__COVERROOT__{$value['cover']}' alt='加载失败'>
                </div>
                <div class='essay-msg'>
                    <h2 class='msg-title'>{$value['title']}</h2>
                    <h3 class='msg-type'>类型：{$value['type']}</h3>
                    <h3 class='msg-author'>作者：{$value['author']}</h3>
                </div>
                <p class='msg-summary'>简介：{$value['summary']}</p>
                <div class='msg-nav'>
                    <i>浏览量{$value['browse']}&nbsp;</i>
                    <i>评论{$value['comment']}</i>
                    <a class='full-text' href='javascript:fullEssay({$value['id']});'>阅读全文>></a>
                </div>
            </div>";

}