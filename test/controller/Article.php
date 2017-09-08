<?php


namespace controller;

class Article{

    public function add(){

        $title=$_POST['title'];
        $content=$_POST['article'];
        $img=$_POST['img'];

        if($content==null&&$title==null){
            echo 0;
            exit;
        }
        else {
            $articl=new \model\ArticleModel();
            $a=$articl->add($title,$content,$img);
        }

        if($a==1){
            echo 1;
        }
        else{
            echo 0;
        }
        
    }

    public function delete(){

        $id=$_POST['id'];

        $articl=new \model\ArticleModel();
        $a=$articl->delete($id);
        if($a==1){
            echo 1;
        }
        else {
            echo 0;
        }
    } 


    public function update(){
        $id=$_POST['id'];
        $title=$_POST['title'];
        $content=$_POST['article'];
        $img=$_POST['img'];

        $articl=new \model\ArticleModel();
        $articl->update($id,$title,$content,$img);

        echo '2';
    }

    public function select(){
        
        $articl=new \model\ArticleModel();

        $getarticle=$articl->select();

        echo json_encode($getarticle);

    }

    public function count(){
            $article=new \model\ArticleModel();
            $getarticle=$article->count();
            return $getarticle;
    }

    public function selectonly(){
        $id=$_POST['id'];
        
        $articl=new \model\ArticleModel();
        
        $getarticle=$articl->selectonly($id);

        echo json_encode($getarticle);
    }

}