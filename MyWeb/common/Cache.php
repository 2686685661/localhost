<?php
/**
 * Created by PhpStorm.
 * User: weiyalin
 * Date: 17-5-13
 * Time: 下午6:17
 */

namespace MyWeb\common;


class Cache
{

    public static function set($url, $value)
    {

        return file_put_contents(self::getPath($url),$value);
    }

    public static function get($url)
    {
        $file_path = self::getPath($url);
        if(file_exists($file_path)){
            return file_get_contents($file_path);
        }

        return null;
    }

    private static function getPath($url)
    {
        $key = self::getKey($url);

        return empty($key)?'':CACHE_PATH.'/'.$key.'.php';
    }
    private static function getKey($url)
    {
        return empty($url)?'':md5($url);
    }


}