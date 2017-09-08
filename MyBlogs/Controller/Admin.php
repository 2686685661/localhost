<?php

namespace MyBlogs\Controller;


class Admin extends Controller
{

    public function backManage(){
        if(isset($_SESSION['myaccount'])) {
            $model = new \MyBlogs\Model\conModel;
            $row = $model->querymy("personal");

            $this->assgin('my',$row);

            $this->display('backManage');
        }else {
            $this->display('register');
        }
    }

    public function proscenium() {
        $model = new \MyBlogs\Model\conModel;
        $row = $model->querymy("personal");
        $this->assgin('my',$row);
        $this->display('proscenium');
    }

    public function picturemy() {
        $model = new \MyBlogs\Model\conModel;
        $row = $model->querymy("picture");
        $this->assgin('mypicture',$row);
        $this->display('pictureMy');
    }

    public function register() {
        if(isset($_SESSION['myaccount'])) {
            $this->backManage();
        }else {
            $this->display('register');
        }
    }

    public function diarymy() {
        $this->display('diaryMy');
    }

    public function recdiarymy() {
        $model = new \MyBlogs\Model\conModel;
        $row = $model->querymy("diary");
        $this->assgin('mydiary',$row);
        $this->display('recdiaryMy');
    }

    public function articalmy() {
        $model = new \MyBlogs\Model\conModel;
        $row = $model->querymy("artical");
        $this->assgin('myartical',$row);
        $this->display('articalMy');
    }

    public function local() {
         $this->display('informationMy');
    }

    public function recheader() {
        $this->display('recheader');
    }

    public function newdiary() {
        $this->display('newdiary');
    }

    public function newartical() {
        $this->display('newArticle');
    }

    public function modifydiary($params=null) {
        $this->display('modifydiary');
    }

    public function modifyartical() {
        $this->display('modifyartical');
    }

    public function rechomepage() {
        $this->display('recHomepage');
    }

    public function recpicture() {
        $this->display('recpicture');
    }

    public function rectheartical() {
        $this->display('rectheartical');
    }

    public function messagemy() {
        $this->display('messageMy');
    }

    public function replymessage() {
        $this->display('replymessage');
    }

    public function recleavmessage() {
        $this->display('recleavmessage');
    }

    public function vagueartical() {
        $this->display('vagueartical');
    }

}