<?php
/**
 * Created by PhpStorm.
 * User: weiyalin
 * Date: 17-5-6
 * Time: 上午6:07
 */

namespace MyWeb\controller;


class Comment extends Controller
{

    private $commentmodel = null;

    public function __construct() {

        $this->commentmodel = new \MyWeb\model\CommentModel();

        if(!isset($_SESSION['myid'])){
            return $this->display('login');
        }

    }


    /**
     * 根据文章id查询评论
     * @param $parms
     * @return string
     */
    public function selectComment($parms){

        if (empty($parms))
            return $this->badJson('参数无效');

        $result = $this->commentmodel->selectCommentByEssayId($parms);

        $this->data = $result;

        $content = $this->display('selectComment');

        return $this->goodJson($content);


    }

    /**
     * 添加评论
     * @param $parms
     * @return string
     */
    public function addComment($parms){

        if (empty($parms['id']))
            return $this->badJson('参数无效');

        if(empty($parms['content']))
            return $this->badJson('评论内容为空');

        $content = $this->removeXSS($parms['content']);

        $time = date('Y-m-d H:i:s');

        $result = $this->commentmodel->addComment([$parms['id'],$parms['visitorname'],$content,$time]);

        if($result)
            return $this->goodJson('','评论成功');
        else
            return $this->badJson('评论失败');
    }

    /**
     * 删除评论
     * @param $parms
     * @return string
     */
    public function delComment($parms){

        if (empty($parms['essayid']))
            return $this->badJson('参数无效');

        $result = $this->commentmodel->delComment([$parms['essayid']]);

        if($result)
            return $this->goodJson('','删除成功'.$parms['essayid']);
        else
            return $this->badJson('删除失败');
    }

}