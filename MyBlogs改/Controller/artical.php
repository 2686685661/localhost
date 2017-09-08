<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午3:16
 */

namespace MyBlogs\Controller;


class artical extends Controller
{

    public function articalmy() {           //??
        $model = new \MyBlogs\Model\Adminmodel;
        $row = $model->querymy("artical");
        $this->assgin('myartical',$row);
        $this->display('articalMy');
    }

    public function modifyartical() {
        $this->display('modifyartical');
    }

    public function rectheartical() {
        $this->display('rectheartical');
    }

    public function vagueartical() {
        $this->display('vagueartical');
    }

    public function newartical() {
        $this->display('newArticle');
    }

    public function modifyarticals() {
        $model = new \MyBlogs\Model\ArticalCommentmondel;
        $modify = $model->modifyArtical($_POST);
        if($modify) {
            echo json_encode(1);
        }else {
            echo json_encode(0);
        }
    }

    public function newarticle() {
        $model = new \MyBlogs\Model\conModel;
        $model->newArticle($_POST);
    }

    public function vagueselect() {
        $model = new \MyBlogs\Model\conModel;
        $vague = $_POST['vague'];
        $row = $model->vagueselect($vague);
        $string=$this->recviewvague($row);
//        echo $string;
        echo json_encode($string);

    }

    public function selectartical($scope = "LIMIT 0,15",$rec=0) { //$rec默认是0表示后台显示，当为1时为前台展示   //??
        $model = new \MyBlogs\Model\conModel;
        $getartical = $model->selectartical($scope);
        if($rec==0) {
            $this->viewartical($getartical);
        }elseif ($rec==1) {
            $this->recviewartical($getartical);
        }
    }


    public function viewartical($get) {
        echo '<div>';
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr><th>id</th><th>标题</th><th>时间</th><th>发表人</th><th></th></tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($get as $row) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['headline'].'</td>';
            echo '<td>'.$row['publishtime'].'</td>';
            echo '<td>'.$row['publishperson'].'</td>';
            echo '<td><button onclick=modifyartical('.$row['id'].')>修改</button><button onclick=deletearticle('.$row['id'].')>删除</button></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        $page = new \MyBlogs\Controller\Page($this->count(1));
        echo $page->fpage();
        echo '</div>';

    }


    public function recviewartical($get) {
        $model = new \MyBlogs\Model\conModel;

        echo '<ul class="list">';
        foreach ($get as $row) {
            $typer='';
            $id = $row['artyid'];
            $rowes = ['name'=>'articleType','diaryid'=>$id];
            $type = $model->returnmodify($rowes);
            foreach ($type as $types) {
                $typer = $types['arTy'];
            }

            echo '<li class="artical-text"><div class="news-img-box fl"><a style="cursor: pointer;" onclick=lookartical('.$row['id'].')>';
            echo '<img class="news-list-img" style="width: 215px;height: 144px;" src="/MyBlogs/View/articalPicture/'.$row['picture'].'" >';
            echo '</a></div>';
            echo '<div class="news-content fr"><h3 class="title-h3"><a style="color: #3d3d3d;cursor: pointer" onclick=lookartical('.$row['id'].')>'.$row['headline'].'</a></h3>';
            echo '<div class="author-info clearfix"><p class="author fl">'.$row['publishperson'].'</p>';
            echo '<span class="date-time fl">发布时间：<em>'.$row['publishtime'].'</em></span>';
            echo '<span class="classify fl">分类：'.$typer.'</span></div>';
//            $artical = ltrim($row['articalcontent'],'<p>');
            $articaltext = strip_tags($row['articalcontent']);
            echo '<p class="news-info">'.$articaltext.'</p></div></li>';
        }
//        echo '<li>';
        $page = new \MyBlogs\Controller\Page($this->count(1));
        echo $page->fpage();
//        echo '</li>';
        echo '</ul>';

    }

    public function recviewvague($get) {
        $string='';
        if($get!=0) {
            $model = new \MyBlogs\Model\conModel;
            $string.='<ul class="list">';
            foreach ($get as $row) {
                $typer='';
                $id = $row['artyid'];
                $rowes = ['name'=>'articleType','diaryid'=>$id];
                $type = $model->returnmodify($rowes);
                foreach ($type as $types) {
                    $typer = $types['arTy'];
                }
                $string.='<li class="artical-text"><div class="news-img-box fl"><a style="cursor: pointer;" onclick=lookartical('.$row['id'].')>';
                $string.='<img class="news-list-img" style="width: 215px;height: 144px;" src="/MyBlogs/View/articalPicture/'.$row['picture'].'" >';
                $string.='</a></div>';
                $string.='<div class="news-content fr"><h3 class="title-h3"><a style="color: #3d3d3d;cursor: pointer" onclick=lookartical('.$row['id'].')>'.$row['headline'].'</a></h3>';
                $string.='<div class="author-info clearfix"><p class="author fl">'.$row['publishperson'].'</p>';
                $string.='<span class="date-time fl">发布时间：<em>'.$row['publishtime'].'</em></span>';
                $string.='<span class="classify fl">分类：'.$typer.'</span></div>';
                $articaltext = strip_tags($row['articalcontent']);
                $string.= '<p class="news-info">'.$articaltext.'</p></div></li>';
            }
            $string.='</ul>';


        }else {
            $string.="查询无结果";
        }

        return $string;
    }
}