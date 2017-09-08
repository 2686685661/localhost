<?php

namespace model;


class ArticleModel
{

    function select($scope="LIMIT 0,15"){
        include "link.php";
        $query="SELECT id,title,issuetime,changetime,likenumber FROM article WHERE yesnoshow=0 ";
        $query.=$scope;
        try{
            $article=$dbh->query($query);
            // echo "查询出来：".$article->rowCount()."条记录";
            return $article->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }


    function count(){
        include "link.php";
        $query="SELECT id,title,issuetime,changetime,likenumber FROM article WHERE yesnoshow=0";

        try{
            $article=$dbh->query($query);
            return $article->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function selectonly($id){
        include "link.php";
             $query="SELECT title,content,img FROM article WHERE yesnoshow=0 and id=?";
        try{

            $stmt=$dbh->prepare($query);
            $stmt->bindParam(1,$id);

            $stmt->execute();

            return $stmt->fetchAll();

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function add($title=null,$content=null,$img=null){
        include "link.php";
        $query="INSERT INTO article(title,content,img,issuetime,changetime) VALUES (?,?,?,?,?)";
        $c=mktime();
            $stmt=$dbh->prepare($query);

            $stmt->bindParam(1,$title);
            $stmt->bindParam(2,$content);
            $stmt->bindParam(3,$img);
            $stmt->bindParam(4,$c);
            $stmt->bindParam(5,$c);

            $stmt->execute();   

            return 1;
    }

    function delete($id){
        include "link.php"; 
        $query="UPDATE article SET yesnoshow=1 WHERE id=?";

        $stmt=$dbh->prepare($query);
        $stmt->bindParam(1,$id);

        $stmt->execute();

        return 1;
    }

    function update($id,$title,$content,$img){
        include "link.php";
        $c=mktime();
        $query="UPDATE article SET title=?,content=?,img=?,changetime=? WHERE id=?";
        $stmt=$dbh->prepare($query);
        
        $stmt->bindParam(1,$title);
        $stmt->bindParam(2,$content);
        $stmt->bindParam(3,$img);
        $stmt->bindParam(4,$c);
        $stmt->bindParam(5,$id);

        $stmt->execute();

    }
}