<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-11
 * Time: 下午5:51
 */

namespace MyBlogs\Controller;


class getfile
{

    private $fileRoute = "/var/www/html/MyBlogs/View/images/";  //图片文件夹的路径

    public function get_allfiles($path,&$files) {
        if(is_dir($path)){
            $dp = dir($path);
            while ($file = $dp ->read()){
                if($file !="." && $file !=".."){

                    $this->get_allfiles($path."/".$file, $files);
                }
            }
            $dp ->close();
        }
        if(is_file($path)){
            $files[] = $path;
        }
    }

    public function get_filenamesbydir($dir){
        $files = array();
        $this->get_allfiles($dir,$files);
        $file = $this->shear($files);
        return $file;
    }

    public function shear($arr) {
        $array = [];
        for($i = 0;$i<count($arr);$i++) {
            $array[$i] = substr($arr[$i],35);
        }
        return $array;
    }

    public function getfiles() {
        $filenames = $this->get_filenamesbydir($this->fileRoute);
        return $filenames;
    }

    public function deletefile() {
        if(is_dir($this->fileRoute)) {
            $filename = $_POST['filename'];
            $file = $this->fileRoute.$filename;
            if(unlink($file)) {
                return "删除成功";
            }else{
                return "删除失败";
            }
        }
    }
}


