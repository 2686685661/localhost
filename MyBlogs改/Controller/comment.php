<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午3:21
 */

namespace MyBlogs\Controller;


class comment extends Controller
{


    public function newlycomment() {
        $model = new \MyBlogs\Model\conModel;
        $new = $model->newlycom($_POST);
        if($new) {
            echo json_encode(1);
        }else {
            echo json_encode(0);
        }
    }


    public function selectcomment() {
        $articalid = $_POST['articalid'];

        $model = new \MyBlogs\Model\conModel();
        $articalcomments = $model->selectcomments($articalid);

        $string = $this->recviewArticalcomment($articalcomments);

        echo json_encode($string);

    }



    public function recviewArticalcomment($get) {
        $string = '';
//        print_r($get);
        foreach ($get as $row) {

            if($row['comid']==0) {

                $string .=  '<div class="content-comment-box">';
                $string.= '<div><p>'.$row['commentname'].':</p><p>'.$row['commenttext'].'</p><div><span class="ds-time">'.$row['commenttime'].'</span><a onclick=clickform('.$row['id'].') class="aaa">回复</a></div>';
                $string.= '<div id="'.$row['id'].'" class="ds-replybox ds-inline-replybox" style="display: none;"><form id='.$row['id'].$row['id'].'><div class="ds-textarea-wrapper ds-rounded-top"><div class="form-input"> 姓名：<input id="commentname'.$row['id'].'" type="text"></div><div class="form-input">邮箱：<input id="commentmailbox'.$row['id'].'" type="text"></div>  <textarea id="commenttext'.$row['id'].'" cols="30" rows="10"></textarea><input type="button" value="提交" onclick=submitcomment('.$row['id'].')></div></form></div></div>';


                for($i=0;$i<count($get);$i++) {
                    if($get[$i]['comid']==$row['id']) {
                        $string.= '<div style="margin-left: 35px;border:1px solid #4c4c4c">';
                        $string.= '<p>'.$get[$i]['commentname'].':</p><p>'.$get[$i]['commenttext'].'</p><div><span class="ds-time">'.$get[$i]['commenttime'].'</span><a onclick=clickform('.$get[$i]['id'].') class="aaa">回复</a></div>';
                        $string.= '<div id="'.$get[$i]['id'].'" class="ds-replybox ds-inline-replybox" style="display: none"><form action=""><div class="ds-textarea-wrapper ds-rounded-top"><div class="form-input">姓名：<input type="text" id="commentname'.$get[$i]['id'].'"></div><div class="form-input"> 邮箱：<input id="commentmailbox'.$get[$i]['id'].'" type="text"></div><textarea id="commenttext'.$get[$i]['id'].'"  cols="30" rows="10"></textarea><input type="button" value="提交" onclick=submitcomment('.$get[$i]['id'].')></div></form></div></div>';
                        for($m=0;$m<count($get);$m++) {
                            if($get[$m]['comid']==$get[$i]['id']) {
                                $string.= '<div style="margin-left: 70px;border:1px solid #00a2d4">';
                                $string.= '<p>'.$get[$m]['commentname'].':</p><p>'.$get[$m]['commenttext'].'</p><div><span class="ds-time">'.$get[$m]['commenttime'].'</span><a onclick=clickform('.$get[$m]['id'].') class="aaa">回复</a></div>';
                                $string.= '<div id="'.$get[$m]['id'].'" class="ds-replybox ds-inline-replybox" style="display: none"><form action=""><div class="ds-textarea-wrapper ds-rounded-top"><div class="form-input">姓名：<input type="text" id="commentname'.$get[$m]['id'].'"></div><div class="form-input"> 邮箱：<input id="commentmailbox'.$get[$m]['id'].'" type="text"></div><textarea id="commenttext'.$get[$m]['id'].'"  cols="30" rows="10"></textarea><input type="button" value="提交" onclick=submitcomment('.$get[$m]['id'].')></div></form></div></div>';

                                for($n=0;$n<count($get);$n++) {
                                    if($get[$n]['comid']==$get[$m]['id']) {
                                        $string.= '<div style="margin-left: 110px;border:1px solid #000">';
                                        $string.= '<p>'.$get[$n]['commentname'].':</p><p>'.$get[$n]['commenttext'].'</p><div><span class="ds-time">'.$get[$n]['commenttime'].'</span><a onclick=clickform('.$get[$n]['id'].') class="aaa">回复</a></div>';
                                        $string.= '<div id="'.$get[$n]['id'].'" class="ds-replybox ds-inline-replybox" style="display: none"><form action=""><div class="ds-textarea-wrapper ds-rounded-top"><div class="form-input">姓名：<input type="text" id="commentname'.$get[$n]['id'].'"></div><div class="form-input"> 邮箱：<input id="commentmailbox'.$get[$n]['id'].'" type="text"></div><textarea id="commenttext'.$get[$n]['id'].'"  cols="30" rows="10"></textarea><input type="button" value="提交" onclick=submitcomment('.$get[$n]['id'].')></div></form></div></div>';

                                        for($a=0;$a<count($get);$a++) {
                                            if($get[$a]['comid']==$get[$n]['id']) {
                                                $string.= '<div style="margin-left: 150px;border:1px solid #9cb945">';
                                                $string.= '<p>'.$get[$a]['commentname'].'</p><p>'.$get[$a]['commenttext'].'</p><div><span class="ds-time">'.$get[$a]['commenttime'].'</span><a style="color:red;" class="aaa">[已无法评论]</a></div>';
                                                $string.= '<div id="'.$get[$a]['id'].'" class="ds-replybox ds-inline-replybox" style="display: none"><form action=""><div class="ds-textarea-wrapper ds-rounded-top"><div class="form-input">姓名：<input type="text" id="commentname'.$get[$a]['id'].'"></div><div class="form-input"> 邮箱：<input id="commentmailbox'.$get[$a]['id'].'" type="text"></div><textarea id="commenttext'.$get[$a]['id'].'"  cols="30" rows="10"></textarea><input type="button" value="提交" onclick=submitcomment('.$get[$a]['id'].')></div></form></div></div>';
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                $string.= '</div>';
            }
        }

        return $string;
    }
}