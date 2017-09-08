<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午3:49
 */

namespace MyBlogs\Controller;


class Communal extends Controller
{

    function getmy() {

        $surface = $_POST['surfacename'];

        $model = new \MyBlogs\Model\conModel;
        $row = $model->querymy($surface);
        echo json_encode(array(
            'data'=>$row
        ));
    }


    public function modify() {
        $model = new \MyBlogs\Model\conModel;
        $a=$model->modificationmy($_POST);
        if($a) {
            self::$admin->backManage();
        }

    }


    public function returndiary() {
        $model = new \MyBlogs\Model\conModel;
        $row = $model->returnmodify($_POST);

        echo json_encode(array(
            'data'=>$row
        ));
    }

    public function modifydiary() {
        $model = new \MyBlogs\Model\conModel;
        $modify = $model->modifyDiary($_POST);
        if($modify)
            echo json_encode(1);
        else
            echo json_encode(0);
    }


    public function deletediary() {
        $model = new \MyBlogs\Model\conModel;
        $delete = $model->delete($_POST);
        if($delete)
            echo json_encode(1);
        else
            echo json_encode(0);
    }

    public function count($a) {
        $model = new \MyBlogs\Model\conModel;
        $countes = $model->counts($a);
        return $countes;
    }


    public function hotartical($name,$limit) {
        $model = new \MyBlogs\Model\conModel;
        $hot = $model->selecthot($name,$limit);
        if($name=='artical') {
            $this->viewhotartical($hot);
        }elseif($name=='leavingMessage') {
            $this->viewhotmessage($hot);
        }
    }


    public function viewhotartical($get) {
        echo '<div class="hot-recommend-wrap">';
        echo '<h2 class="title-h1 clearfix">热门文章</h2>';
        echo '<div id="hotRecommend" class="hot-recommend"><ul>';
        foreach ($get as $row) {
            echo '<li><a style="cursor: pointer" onclick=lookartical('.$row['id'].')>'.$row['headline'].'</a></li>';
        }
        echo '</ul></div>';
        echo '<ol class="number"><li class="one">1</li><li class="two">2</li><li class="three">3</li><li>4</li><li>5</li>';
        echo '</ol></div>';
    }

    public function viewhotmessage($get) {
        echo '<div class="hot-recommend-wrap">';
        echo '<h2 class="title-h1 clearfix">热门留言</h2>';
        echo '<div id="hotRecommend" class="hot-recommend"><ul>';
        foreach ($get as $row) {
            $message = ltrim($row['leavtext'],'<p>');
            $messagetext = rtrim($message,'</p>');
            echo '<li><a style="cursor: pointer">'.$row['leavname'].'说：'.$messagetext.'</a></li>';
        }
        echo '</ul></div>';
        echo '<ol class="number"><li class="one">1</li><li class="two">2</li><li class="three">3</li><li>4</li><li>5</li>';
        echo '</ol></div>';
    }
}