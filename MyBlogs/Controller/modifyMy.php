<?php

namespace MyBlogs\Controller;

/**
 * Class modifyMy
 * @package MyBlogs\Controller
 * 包含方法，插入数据库数据
 */
class modifyMy extends Controller
{
    public static $admin;
    function __construct() {
        self::$admin = new \MyBlogs\Controller\Admin();
    }

    function getmy() {

        $surface = $_POST['surfacename'];

        $model = new \MyBlogs\Model\conModel;
        $row = $model->querymy($surface);
        echo json_encode(array(
            'data'=>$row
        ));
    }
//
//    function getDiary() {
//        $model = new \MyBlogs\Model\conModel;
//        $row = $model->querymy("diary");
//        echo json_encode(array(
//            'data'=>$row
//        ));
//    }

    public function modify() {
        $model = new \MyBlogs\Model\conModel;
        $a=$model->modificationmy($_POST);
        if($a) {
            self::$admin->backManage();
        }

    }

    public function newdiary(){

        $model = new \MyBlogs\Model\conModel;
        $new = $model->newDiary($_POST);
        if($new) {
            self::$admin->diarymy();
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

    public function modifyartical() {
        $model = new \MyBlogs\Model\conModel;
        $modify = $model->modifyArtical($_POST);
        if($modify) {
            echo json_encode(1);
        }else {
            echo json_encode(0);
        }
    }



    public function replyleaving() {
        $model = new \MyBlogs\Model\conModel;
        $reply = $model->replymessage($_POST);
        if($reply)
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

    public function newlycomment() {
        $model = new \MyBlogs\Model\conModel;
        $new = $model->newlycom($_POST);
        if($new) {
            echo json_encode(1);
        }else {
            echo json_encode(0);
        }
    }

    public function newarticle() {
        $model = new \MyBlogs\Model\conModel;
        $model->newArticle($_POST);
    }

    public function newmessage() {

        $model = new \MyBlogs\Model\conModel();
        $new=$model->newleaving($_POST);
        if($new) {
            self::$admin->recleavmessage();
        }else {
            echo "留言错误";
        }
    }

    public function count($a) {
        $model = new \MyBlogs\Model\conModel;
        $countes = $model->counts($a);
        return $countes;
//        if($a==0) {
//            $countes = $model->countdiary();
//            return $countes;
//        }elseif ($a==1) {
//            $countes = $model->counartical();
//            return $countes;
//        }elseif ($a==2) {
//
//        }
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


    public function vagueselect() {
        $model = new \MyBlogs\Model\conModel;
        $vague = $_POST['vague'];
        echo $vague;
        $row = $model->vagueselect($vague);
        $string=$this->recviewartical($row);
//        echo $string;
        echo json_encode($string);

    }





    public function selectdiary($scope = "LIMIT 0,15",$rec=0) {   //$rec默认是0表示后台显示，当为1时为前台展示
        $model = new \MyBlogs\Model\conModel;
        $getdiary = $model->selectdiary($scope);
        if($rec==0) {
            $this->viewdiary($getdiary);
        }elseif ($rec==1) {
            $this->recviewdiary($getdiary);
        }
    }


    public function selectartical($scope = "LIMIT 0,15",$rec=0) { //$rec默认是0表示后台显示，当为1时为前台展示
        $model = new \MyBlogs\Model\conModel;
        $getartical = $model->selectartical($scope);
        if($rec==0) {
            $this->viewartical($getartical);
        }elseif ($rec==1) {
            $this->recviewartical($getartical);
        }
    }


    public function selectpicture($scope = "LIMIT 0,5",$rec=0) { //$rec默认是0表示后台显示，当为1时为前台展示
        $model = new \MyBlogs\Model\conModel;
        $getpicture = $model->selectpicture($scope);
        if($rec==0) {
            $this->viewpicture($getpicture);
        }elseif ($rec==1) {
            $this->recviewpicture($getpicture);
        }
    }

    public function selectleavmessage($scope = "LIMIT 0,10",$rec = 0) {  //$rec默认为0表示后台显示，当为1表示前台展示
        $model = new \MyBlogs\Model\conModel();
        $getleaving = $model->selectleaving($scope);
        if($rec==0) {
            $this->viewleaving($getleaving);
        }elseif ($rec==1) {
            $this->recviewleaving($getleaving);
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