<?php


function filesTypes($filename) {
    $file = fopen($filename, "rb");
    $bin = fread($file, 4);
    fclose($file);
    $strInfo = @unpack("H*chars", $bin);
    $typeCode = $strInfo['chars'];
    $typeCode = strtoupper($typeCode);

    $hex_3 =  substr($typeCode,0,6);
    $hex_4 =  substr($typeCode,0,8);
    $hex_5 =  substr($typeCode,0,10);

    $fileType = '';
    switch ($hex_3)
    {
        case 'FFD8FF':
            $fileType = 'jpg';
            break;
    }

    if(!empty($fileType)){
        return $fileType;
    }

    switch ($hex_4)
    {
        case '89504E47':
            $fileType = 'png';
            break;
        case '504B0304':
            $fileType = 'zip';
            break;
        case 'D0CF11E0 ':
            $fileType = 'doc';
            break;
        default:
            $fileType = 'unknown: '.$typeCode;
    }

    if(!empty($fileType)){
        return $fileType;
    }

    switch ($hex_5)
    {
        case '68746D6C3E':
            $fileType = 'html';
            break;
    }


    return $fileType;
}