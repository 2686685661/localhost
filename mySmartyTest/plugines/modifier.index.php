<?php

function smarty_modifier_index($var,$color,$size) {

    return '<font color="'.$color.'" size="'.$size.'">'.$var.'</font>';
}