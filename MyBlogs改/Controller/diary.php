<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午3:17
 */

namespace MyBlogs\Controller;


class diary extends Controller
{


    public function diarymy() {
        $this->display('diaryMy');
    }

    public function recdiarymy() {
        $model = new \MyBlogs\Model\conModel;
        $row = $model->querymy("diary");
        $this->assgin('mydiary',$row);
        $this->display('recdiaryMy');
    }

    public function newdiary() {
        $this->display('newdiary');
    }

    public function modifydiary($params=null) {
        $this->display('modifydiary');
    }

    public function newlydiary(){

        $model = new \MyBlogs\Model\conModel;
        $new = $model->newDiary($_POST);
        if($new) {
            $this->diarymy();
        }
    }

    public function selectdiary($scope = "LIMIT 0,15",$rec=0) {   //$rec默认是0表示后台显示，当为1时为前台展示 //??
        $model = new \MyBlogs\Model\conModel;
        $getdiary = $model->selectdiary($scope);
        if($rec==0) {
            $this->viewdiary($getdiary);
        }elseif ($rec==1) {
            $this->recviewdiary($getdiary);
        }
    }


    public function viewdiary($get) {
        echo '<div>';
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr><th>篇数</th><th>时间</th><th>日记</th><th></th></tr>';
        echo '</thead>';
        echo '<tbody id="diarybody">';
        foreach($get as $row) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['diarytime'].'</td>';
            echo '<td>'.$row['diarycontent'].'</td>';
            echo '<td><button onclick=modifyDiary('.$row['id'].')>修改</button><button onclick=deleteDiary('.$row['id'].')>删除</button></td>';
            echo '</tr>';
        }

        echo '</tbody>';

        echo '</table>';

        $page = new \MyBlogs\Controller\Page($this->count(0));
        echo $page->fpage();
        echo '</div>';

    }

    public function recviewdiary($get) {
        echo '<div>';
        foreach ($get as $row) {
            echo "<ul class='arraw-box bounceIn animated'>";
            echo "<div class='sy'><p>".$row['diarycontent']."</p></div>";
            echo "<span class='dateview'>".$row['diarytime']."</span>";
            echo "</ul>";
        }
        $page = new \MyBlogs\Controller\Page($this->count(0));
        echo $page->fpage();
        echo '</div>';
    }

}