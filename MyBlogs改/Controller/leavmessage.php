<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午3:25
 */

namespace MyBlogs\Controller;


class leavmessage extends Controller
{

    public function recleavmessage() {
        $this->display('recleavmessage');
    }

    public function messagemy() {
        $this->display('messageMy');
    }

    public function replymessage() {
        $this->display('replymessage');
    }


    public function replyleaving() {
        $model = new \MyBlogs\Model\conModel;
        $reply = $model->replymessage($_POST);
        if($reply)
            echo json_encode(1);
        else
            echo json_encode(0);
    }

    public function newmessage() {

        $model = new \MyBlogs\Model\conModel();
        $new=$model->newleaving($_POST);
        if($new) {
            $this->recleavmessage();
        }else {
            echo "留言错误";
        }
    }

    public function selectleavmessage($scope = "LIMIT 0,10",$rec = 0) {  //$rec默认为0表示后台显示，当为1表示前台展示  //??
        $model = new \MyBlogs\Model\conModel();
        $getleaving = $model->selectleaving($scope);
        if($rec==0) {
            $this->viewleaving($getleaving);
        }elseif ($rec==1) {
            $this->recviewleaving($getleaving);
        }
    }


    public function recviewleaving($get) {
        foreach ($get as $row) {
            echo '<div class="story">';
            echo '<div class="opbtn"></div>';
            echo '<p class="story_t">'.$row['leavname'].'</p>';
            echo '<p class="story_time">'.$row['leavtime'].'</p>';
            echo '<p class="story_m">'.$row['leavtext'].'</p>';
            if(!empty($row['replytime'])) {
                echo '<div class="story_time_hf">'.$row['replytime'].'</div>';
                echo '<div class="story_hf">作者回复：'.$row['replytext'].'</div>';
            }

            echo '</div>';
        }
        $page = new \MyBlogs\Controller\Page($this->count(3));
        echo $page->fpage();

    }



    public function viewleaving($get){
        echo '<div>';
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr><th>id</th><th>留言者</th><th>留言者邮箱</th><th>留言时间</th><th>留言内容</th><th>回复时间</th><th>回复内容</th><th>留言操作</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($get as $row){
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['leavname'].'</td>';
            echo '<td>'.$row['leavmailbox'].'</td>';
            echo '<td>'.$row['leavtime'].'</td>';
            echo '<td>'.$row['leavtext'].'</td>';
            echo '<td>'.$row['replytime'].'</td>';
            echo '<td>'.$row['replytext'].'</td>';
            echo '<td><button onclick=replymessage('.$row['id'].')>回复</button><button onclick=deletemessage('.$row['id'].')>删除</button></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        $page = new \MyBlogs\Controller\Page($this->count(3));
        echo $page->fpage();
        echo '</div>';


    }
}