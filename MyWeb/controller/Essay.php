<?php

namespace MyWeb\controller;


class Essay extends Controller
{
    private $essaymodel = null;

    public function __construct() {

        $this->essaymodel = new \MyWeb\model\EssayModel();

        if(!isset($_SESSION['myid'])){
            return $this->display('login');
        }

    }

    /**
     * 添加文章页面
     */
    public function addEssay(){

        $content = $this->display('addEssay');

        return $this->goodJson($content);

    }

    /**
     * 添加文章
     */
    public function addEssays($parms){

        $title = trim($parms['title']);

        if(empty($title)){

            return $this->badJson('文章标题为空');

        }

        $type = trim($parms['type']);

        if(empty($type)){

            return $this->badJson('文章类型为空');

        }

        $author = trim($parms['author']);

        if(empty($author)){

            return $this->badJson('文章作者为空');

        }

        $summary = trim($parms['summary']);

        if(empty($summary)){

            return $this->badJson('文章简介为空');

        }

        $content = trim($parms['content']);

        if(empty($content)){

            return $this->badJson('文章内容为空');

        }


        $up = new \MyWeb\common\FileUpload();

        $up->set('path','./img/cover');

        $uploadresult = $up->upload('cover');

        if($uploadresult){

            $fileName = $up->getFileName();

            foreach ($fileName as $key => $value){

                $time = date('Y-m-d H:i:s');

                $resultOfAddEssay = $this->essaymodel->addEssay([$title,$type,$author,$value,$summary,$content,$time]);

                if($resultOfAddEssay){

                    return $this->goodJson('',"文章添加成功");

                }else{

                    return $this->badJson("文章添加失败".$time);

                }


            }

        }else{

            $errors = $up->getErrorMsg();
            return $this->badJson($errors);

        }

    }

    /**
     * 分页查询文章
     * @param null $parms
     * @return string
     */
    public function allEssay($parms = null){

        $total =  count($this->essaymodel->allEssay());

        $page = new \MyWeb\common\Page($parms['methodName'],$total,$parms['page'],20);

        $pageData = $this->essaymodel->searchEssay($page->limit);

        if(count($pageData) !== 0){

            $this->data = $pageData;

            $pageContent = $page->fpage();

            $content = $this->display('allEssay');

            return $this->goodJson([$content,$pageContent]);

        }else{

            return $this->badJson('查询失败');

        }

    }

    /**
     * 分页模糊查询文章
     * @param null $parms
     * @return string
     */
    public function vagueSearchEssay($parms = null){

        if(isset($parms['type']) && $parms['type'] == 1){
            $display = 'selectPageEssay';
            $pageSize = 8;
        }
        else{
            $display = 'allEssay';
            $pageSize = 20;
        }

        if(isset($parms['search']))
            $_SESSION['search'] = $parms['search'];

        $total =  count($this->essaymodel->vagueSearchEssay([$_SESSION['search'],$_SESSION['search']]));

        $page = new \MyWeb\common\Page($parms['methodName'],$total,$parms['page'],$pageSize);

        $pageData = $this->essaymodel->vagueSearchEssay([$_SESSION['search'],$_SESSION['search']],$page->limit);

        if(count($pageData) !== 0){

            $this->data = $pageData;

            $pageContent = $page->fpage();

            $content = $this->display($display);

            return $this->goodJson([$content,$pageContent]);

        }else{

            return $this->badJson('查询失败');

        }

    }

    /**
     * 修改文章页面
     * @param $parms
     * @return string
     */
    public function editEssay($parms){

        //把文章的id存下，以便修改文章内容
        $_SESSION['essayid'] = $parms['id'];

        $result = $this->essaymodel->searchEssayById($parms);

        if($result){

            $this->data = $result[0];

            $content = $this->display('editEssay');

            return $this->goodJson($content);

        }else{

            return $this->badJson('文章不存在');

        }
    }

    /**
     * 修改文章
     */
    public function editEssays($parms){

        $title = trim($parms['title']);

        if(empty($title)){

            return $this->badJson('文章标题为空');

        }

        $type = trim($parms['type']);

        if(empty($type)){

            return $this->badJson('文章类型为空');

        }

        $author = trim($parms['author']);

        if(empty($author)){

            return $this->badJson('文章作者为空');

        }

        $summary = trim($parms['summary']);

        if(empty($summary)){

            return $this->badJson('文章简介为空');

        }

        $content = trim($parms['content']);

        if(empty($content)){

            return $this->badJson('文章内容为空');

        }

        $up = new \MyWeb\common\FileUpload();

        $up->set('path','./img/cover');

        $uploadresult = $up->upload('cover');

        if($uploadresult){

            $fileName = $up->getFileName();

            foreach ($fileName as $key => $value){

                $time = date('Y-m-d H:i:s');

                $resultOfeditEssay = $this->essaymodel->editEssay1(
                    [$title,$type,$author,$value,$summary,$content,$time,$_SESSION['essayid']]);

                if($resultOfeditEssay){

                    return $this->goodJson('','文章修改成功');

                }else{

                    return $this->badJson('文章修改失败');

                }

            }

        }else{

            $errors = $up->getErrorMsg();

            $errorsarr = explode('/',$errors[0]);

            if($errorsarr[1] == '4'){

                $time = date('Y-m-d H:i:s');

                $resultOfeditEssay = $this->essaymodel->editEssay2(
                    [$title,$type,$author,$summary,$content,$time,$_SESSION['essayid']]);

                if($resultOfeditEssay){

                    return $this->goodJson('','文章修改成功');

                }else{

                    return $this->badJson('文章修改失败');

                }
            }

            return $this->badJson($errors);

        }

    }

    /**
     * 删除文章
     * @param $parms
     * @return string
     */
    public function deleteEssay($parms){

        $res = $this->essaymodel->searchEssayById($parms);

        if(count($res)){

            $cover = $res[0]['cover'];

            $loc = unlink('./img/cover/'.$cover);

            if ($loc == 0){
                return $this->badJson('本地删除失败');
            }

            $result = $this->essaymodel->deleteEssay($parms);

            if ($result){

                return $this->goodJson('','删除成功');

            }else{

                return $this->badJson('文章不存在');

            }
        }else{

            return $this->badJson('文章不存在'.$parms['id']);

        }


    }

    /**
     * 经典文章
     * @return string
     */
    public function classicalEssay(){

        $result = $this->essaymodel->searchEssayOrderByBrowse("0,5");

        $this->data = $result;

        $content = $this->display('classicalEssay');

        return $this->goodJson($content);

    }

    /**
     * 最新文章
     * @return string
     */
    public function newEssay(){

        $result = $this->essaymodel->searchEssayOrderById("0,10");

        $this->data = $result;

        $content = $this->display('newEssay');

        return $this->goodJson($content);

    }


    /**
     * 全文页面
     * @param $parms
     * @return string
     */
    public function fullEssay($parms){

        $result = $this->essaymodel->searchEssayByIdAndUpdateBrowse($parms);

        if(count($result) !== 0){

            $this->data = $result[0];

            $content = $this->display('fullEssay');

            return $this->goodJson($content);

        }else{

            return $this->badJson('查询失败');

        }

    }

    public function getLastData(){


    }
    /**
     * 前台分页查询
     * @param null $parms
     * @return string
     */
    public function selectPageEssay($parms = null){

        $total =  count($this->essaymodel->allEssay());

        $page = new \MyWeb\common\Page($parms['methodName'],$total,$parms['page'],8);

        $pageData = $this->essaymodel->searchEssay($page->limit);

        if(count($pageData) !== 0){

            $this->data = $pageData;

            $pageContent = $page->fpage();

            $content = $this->display('selectPageEssay');

            return $this->goodJson([$content,$pageContent]);

        }else{

            return $this->badJson('查询失败'.$page->limit);

        }

    }


    /**
     * 评论量增加
     * @param $parms
     * @return string
     */
    public function addComment($parms){

        $result = $this->essaymodel->searchEssayById($parms);

        if($result){

            $comment = $result[0]['comment'];

            $comment += 1;

            $res = $this->essaymodel->updateComment([$comment,$parms['id']]);

            if($res){

                return $this->goodJson('','评论量增加');

            }else{

                return $this->badJson('浏览出错');

            }

        }else{

            return $this->badJson('文章不存在');

        }

    }

}