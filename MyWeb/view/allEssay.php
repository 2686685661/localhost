<div style="width: 300px; margin: 0 auto">
    <input type="text" style="width: 200px" id="vagueSearchValue">
    <input type="button" value="搜索" id="vagueSearchEssay">
</div>
<table class='page-table' cellpadding='0' cellspacing='0' border='1' >
    <tr>
        <td>编号</td>
        <td>标题</td>
        <td>类型</td>
        <td>作者</td>
        <td>浏览</td>
        <td>评论</td>
        <td>修改时间</td>
        <td>操作</td>
    </tr>
    <?php

    foreach($this->data as $v)
    {
    echo    "<tr>
                <td>{$v['id']}</td>
                <td>{$v['title']}</td>
                <td>{$v['type']}</td>
                <td>{$v['author']}</td>
                <td>{$v['browse']}</td>
                <td>{$v['comment']}</td>
                <td>{$v['time']}</td>
                <td>
                    <a href='javascript:editEssay({$v['id']});' class='page-operate'>编辑 </a>
                    <a href='javascript:deleteEssay({$v['id']});' class='page-operate'> 删除</a>
                </td>
            </tr>";
    }

    ?>
</table>
