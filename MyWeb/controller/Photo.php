<?php

namespace MyWeb\controller;


use MyWeb\common\FileUpload;

class Photo extends Controller
{

    private  $photomodel = null;
    public function __construct(){
        $this->photomodel  = new \MyWeb\model\PhotoModel();

        if(!isset($_SESSION['myid'])){
            return $this->display('login');
        }
    }

    /**
     * 上传图片页面
     * @return string
     */
    public function uploadPhoto(){

        $content = $this->display('uploadPhoto');

        return $this->goodJson($content);

    }

    /**
     * 用户上传多张图片
     * @return string
     */
    public function receivePhoto(){

        $up = new FileUpload();

        $uploadresult = $up->upload('images');

        if($uploadresult){

            $fileName = $up->getFileName();

            $result  = [];
            $isError = false;

            foreach ($fileName as $key => $value){

                $result[$key] = $this->photomodel->savePhoto([$value]);

                if(!$result[$key]){

                    $isError = true;

                }

            }

            if($isError)
                return $this->badJson($result);
            else
                return $this->goodJson('','共'.count($fileName).'张图片上传成功');

        }else{

            $errors = $up->getErrorMsg();
            return $this->badJson($errors);

        }

    }

    /**
     * 查看图片
     * @param $parms
     * @return mixed|string
     */
    public function selectPhotos($parms){

        $total =  count($this->photomodel->selectallPhotos());

        $page = new \MyWeb\common\Page($parms['methodName'],$total,$parms['page'],20);

        $pageData = $this->photomodel->selectPhotos($page->limit);

        if(count($pageData) !== 0){

            $this->data = $pageData;

            $pageContent = $page->fpage();

            $content = $this->display('selectPhotos');

            return $this->goodJson([$content,$pageContent]);

        }else{

            return $this->badJson('没有图片');

        }

    }

    /**
     * 删除图片
     * @param $parms
     * @return mixed|string
     */
    public function deimg($parms){

        $res = $this->photomodel->selectPhotoById($parms);
        $name = $res[0]['name'];
        $loc = unlink('./img/photo/'.$name);

        if ($loc == 0){
            return $this->badJson('本地删除失败');
        }

        $result = $this->photomodel->deimg($parms);

        if($result){

            return $this->goodJson('','删除成功');

        }else{

            return $this->badJson('删除失败');

        }

    }

    /**
     * 查看图片
     * @param $parms
     * @return mixed|string
     */
    public function selectPagePhotos($parms){

        $total =  count($this->photomodel->selectallPhotos());

        $page = new \MyWeb\common\Page($parms['methodName'],$total,$parms['page'],20);

        $pageData = $this->photomodel->selectPhotos($page->limit);

        if(count($pageData) !== 0){

            $this->data = $pageData;

            $pageContent = $page->fpage();

            $content = $this->display('selectPagePhotos');

            return $this->goodJson([$content,$pageContent]);

        }else{

            return $this->badJson('查询失败'.$page->limit);

        }

    }

}