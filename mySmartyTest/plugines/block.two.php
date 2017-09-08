<?php

function smarty_block_two($params,$content,$smarty,&$repeat) {

    if(!$repeat) {
        if(isset($content)) {
            $lang = $params['lang'];

            return $content;
        }
    }
}