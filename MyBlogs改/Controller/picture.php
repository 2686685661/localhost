<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午3:22
 */

namespace MyBlogs\Controller;


class picture extends Controller
{

    public function picturemy() {
        $model = new \MyBlogs\Model\conModel;
        $row = $model->querymy("picture");
        $this->assgin('mypicture',$row);
        $this->display('pictureMy');
    }

    public function recpicture() {
        $this->display('recpicture');
    }

    public function selectpicture($scope = "LIMIT 0,5",$rec=0) { //$rec默认是0表示后台显示，当为1时为前台展示    //??
        $model = new \MyBlogs\Model\conModel;
        $getpicture = $model->selectpicture($scope);
        if($rec==0) {
            $this->viewpicture($getpicture);
        }elseif ($rec==1) {
            $this->recviewpicture($getpicture);
        }
    }


    public function viewpicture($get) {
        echo '<div class="picture-Exhibition">';
        foreach ($get as $row) {
            echo '<div class="body-img">';
            echo '<img class="img" src="/MyBlogs/View/images/'.$row['picturename'].'"/>';
            echo "<button type='button' class='button black' onclick=deletepicture(".$row['id'].",'".$row['picturename']."')>删除</button>";
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="paging">';
        $page = new \MyBlogs\Controller\Page($this->count(2));
        echo $page->fpage();
        echo '</div>';


    }


    public function recviewpicture($get) {

        echo '<div class="picture-Exhibition">';
        foreach ($get as $row) {

            echo '<div class="body-img">';
            echo '<img class="imgs" src="/MyBlogs/View/images/'.$row['picturename'].'"/>';

            echo '</div>';
        }
        echo '</div>';
        echo '<div class="paging">';
        $page = new \MyBlogs\Controller\Page($this->count(2));
        echo $page->fpage();
        echo '</div>';
    }
}