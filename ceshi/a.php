<?php



function morage_array() {

    $args = func_get_args();

    foreach ($args[0] as $key => $value) {
        foreach ($args[1] as $keys => $values) {

        }
    }
    foreach ($args as $key => $value) {

        var_dump($value);
        echo '<br>';

    }

}

morage_array(
    [
        'where',
        'orderBy'
    ],[
       "id,=,1",
        "id,desc"
    ]
);