<table class='page-table' cellpadding='0' cellspacing='0' border='1' >
    <tr>
        <td>编号</td>
        <td>用户名</td>
        <td>密码</td>
        <td>注册时间</td>
    </tr>
    <?php

    foreach($this->data as $v)
    {
        echo    "<tr>
                <td>{$v['id']}</td>
                <td>{$v['name']}</td>
                <td>{$v['password']}</td>
                <td>{$v['date']}</td>
                <td>
                    <a href='javascript:delEnroll({$v['id']});' class='page-operate'> 删除</a>
                </td>
            </tr>";
    }

    ?>
</table>