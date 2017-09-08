<?php

foreach ($this->data as $key => $value){

    $floor = $key+1;

    echo   "<div class='clearboth com-part'>
                <div class='floor'>
                    {$floor}楼&nbsp;{$value['visitorname']}：
                </div>
                <p class='com-content'>
                    {$value['content']}
                </p>
                <div class='comment-time'>{$value['date']}</div>
            </div>";


}
?>
