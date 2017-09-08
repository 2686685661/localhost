<?php


namespace MyBlogs\Model;



 class conModel
 {

     public static $dbh;

     function __construct()
     {

         try {
             self::$dbh = new \PDO("mysql:host=localhost;dbname=MyBlogs;charset=utf8", "root", "716523");
//             self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch (PDOException $e) {
             echo "数据库连接失败：" . $e->getMessage();
         }
     }


 //查询自己个人信息和账号密码的方法
     function querymy($a)                     //??
     {
//         $row = [];
         $query = "select * from ".$a;
         try {
             $pdostate = self::$dbh->query($query);
         } catch (PDOException $e) {
             echo $e->getMessage();
         }
         $row = $pdostate->fetchAll(\PDO::FETCH_ASSOC);
         return $row;

     }

     function counts($a) {               //??
         $query = '';
         if($a==0) {
             $query = "select * from diary";
         }elseif($a==1) {
             $query = "select * from artical";
         }elseif ($a==2) {
             $query = "select * from picture";
         }elseif ($a==3) {
             $query = "select * from leavingMessage";
         }
         try{
             $pdostate = self::$dbh->query($query);
             return $pdostate->rowCount();
         }catch (PDOException $e) {
             echo $e->getMessage();
         }

     }

     function delete($row) {              //??
         $query = "delete from ".$row['name']." where id=".$row['diaryid'];
         $state = self::$dbh->exec($query);
         if($state)
             return true;
         else
             return false;
     }
     function returnmodify($row) {           //??

         $query = "select * from ".$row['name']." where id=".$row['diaryid'];
//         log($query);
         try{
             $pdostate = self::$dbh->query($query);
         }catch (PDOException $e) {
             echo $e->getMessage();
         }
         $rows = $pdostate->fetchAll(\PDO::FETCH_ASSOC);
         return $rows;
     }

     public function selecthot($name,$limit) {  //??
         if($name=='artical') {
             $query = "select * from ".$name." order by readnumber desc ".$limit;
         }elseif($name=='leavingMessage') {
             $query = "select * from ".$name." order by leavtime desc ".$limit;
         }

         try{
             $state = self::$dbh->query($query);
         }catch (\PDOException $e) {
             $e->getMessage();
         }
         $row = $state->fetchAll(\PDO::FETCH_ASSOC);
         return $row;
     }












     function modifyDiary($row) {                       //??
         $time = date("Y-m-d",strtotime($row['modifytime']));

         $query = "update diary set diarytime=?,diarycontent=? where id=".$row['id'];
         $pdostate = self::$dbh->prepare($query);
         $pdostate->bindparam(1,$time);
         $pdostate->bindparam(2,$row['modifysub']);
         if($pdostate->execute()) {
             return true;
         }else {
             return false;
         }
     }


     function modifyArtical($row) {                   //??

         $artyid='';
         $articaltype = $row['articletype'];
         $query = "select * from articleType where arTy='$articaltype'";
         $pdo = self::$dbh->query($query);
         foreach ($pdo as $pdoarr) {
             $artyid = $pdoarr['id'];
         }
        $headline = $row['headline'];
         $articalcontent = $row['articalcontent'];
         $id = $row['id'];
         $querytwo = "update artical set headline='$headline',articalcontent='$articalcontent',artyid=$artyid where id=$id";

         $state = self::$dbh->exec($querytwo);
         if($state) {
             return true;
         }else {
             return false;
         }
     }


    public function replymessage($row) {       //??
        $query = "update leavingMessage set replytime=?,replytext=? where id=".$row['id'];
        $time = date("Y-m-d H:i:s",strtotime("now"));
        $pdostate = self::$dbh->prepare($query);
        $pdostate->bindparam(1,$time);
        $pdostate->bindparam(2,$row['replytext']);

        if($pdostate->execute()) {
            return true;
        }else {
            return false;
        }
    }





    //修改自己个人信息的方法
    function modificationmy($row) {                  //??

        $query = 'update personal set myName=?,qq=?,myWork=?,myExplain=?,myHobby=?';
        $pdostate = self::$dbh->prepare($query);
        $pdostate->bindparam(1,$row['name']);
        $pdostate->bindparam(2,$row['qqnumber']);
        $pdostate->bindparam(3,$row['work']);
        $pdostate->bindparam(4,$row['explain']);
        $pdostate->bindparam(5,$row['hobby']);
       if( $pdostate->execute()) {
           return true;
       }else {
           return false;
       }
    }


    function newleaving($row) {            //??

        $query = "insert into leavingMessage (leavname,leavmailbox,leavtime,leavtext) values (?,?,?,?)";
        $time = date("Y-m-d H:i:s",strtotime("now"));

        $pdostate = self::$dbh->prepare($query);
        $pdostate->bindparam(1,$row['leavname']);
        $pdostate->bindparam(2,$row['mailbox']);
        $pdostate->bindparam(3,$time);
        $pdostate->bindparam(4,$row['messagecontent']);

        if($pdostate->execute()) {
            return true;
        }else {
            return false;
        }
    }



    function newDiary($row) {                //??

        $query = "insert into diary (diarytime,diarycontent) values (?,?)";
        $pdostate = self::$dbh->prepare($query);

        $date= date("Y-m-d",strtotime($row["diarydate"]));

        $pdostate->bindparam(1,$date);
        $pdostate->bindparam(2,$row['diarysubject']);
        $pdostate->execute();
        if($pdostate->execute()) {
            return true;
        }else {
            return false;
        }
    }

    function newlycom($row) {                         //??

        $time = date("Y-m-d H:i:s",strtotime("now"));
//        if($row['pitchid']!=0) {
            $query = "insert into articalcomment (commentname,commentmailbox,commenttext,articalid,comid,commenttime) values (?,?,?,?,?,?)";
            $pdostate = self::$dbh->prepare($query);
            $pdostate->bindparam(1,$row['namevalue']);
            $pdostate->bindparam(2,$row['mailboxvalue']);
            $pdostate->bindparam(3,$row['votextvalue']);
            $pdostate->bindparam(4,$row['articalid']);
            $pdostate->bindparam(5,$row['pitchid']);
            $pdostate->bindparam(6,$time);

            if($pdostate->execute()) {
                return true;
            }else {
                return false;
            }
    }

    function newpicture($picname) {                 //??

        $query = "insert into picture (picturename) values (?)";
        $pdostate = self::$dbh->prepare($query);
        $pdostate->bindparam(1,$picname);
        $pdostate->execute();
    }

    function newArticle($row) {              //??
        $artyid='';
        $person = '李闪磊';
        $time = date("Y-m-d H:i:s",strtotime("now"));
        $articaltype = $row['articletype'];
        $query = "select * from articleType where arTy='$articaltype'";

        try{
            $pdo = self::$dbh->query($query);
            foreach ($pdo as $pdoarr) {
                $artyid = $pdoarr['id'];
            }
        }catch (\PDOException $e) {
            echo $e->getMessage();
        }

        $querytwo = "insert into artical (artyid,headline,publishtime,publishperson,articalcontent,readnumber,picture) values ($artyid,?,?,'$person',?,0,?)";

        $pdostate = self::$dbh->prepare($querytwo);
        $pdostate->bindparam(1,$row['headline']);
        $pdostate->bindparam(2,$time);
        $pdostate->bindparam(3,$row['articalcontent']);
        $pdostate->bindparam(4,$row['imgurl']);
        $pdostate->execute();
//        if() {
//            return true;
//        }else {
//            return false;
//        }
    }


    public function selectdiary($scope = "LIMIT 0,15") {              //??
        $query = "select * from diary ";
        $query.="order by diarytime desc ";
        $query.=$scope;
        echo $query;
        try{
            $state = self::$dbh->query($query);
        }catch (\PDOException $e) {
            $e->getMessage();
        }
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function selectartical($scope = "LIMIT 0,15") {               //??
        $query = "select * from artical ";
        $query.="order by publishtime desc ";
        $query.=$scope;
        try{
            $state = self::$dbh->query($query);
        }catch (\PDOException $e) {
            $e->getMessage();
        }
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function selectcomments($articalid) {         //??
        $query = "select * from articalcomment where articalid=".$articalid." order by comid asc";

        try{
            $state = self::$dbh->query($query);
        }catch (\PDOException $e) {
            $e->getMessage();
        }
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function selectleaving($scope = "LIMIT 0,5") {       //??
        $query = "select * from leavingMessage ";
        $query.="order by leavtime desc ";
        $query.=$scope;
        try{
            $state = self::$dbh->query($query);
        }catch (\PDOException $e) {
            $e->getMessage();
        }
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }



    public function selectpicture($scope = "LIMIT 0,5") {             //??
        $query = "select * from picture ";
        $query.=$scope;
        try{
            $state = self::$dbh->query($query);
        }catch (\PDOException $e) {
            $e->getMessage();
        }
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function vagueselect($vague) {                  //??

        $artyid = '';
        $query = "select * from articleType where arTy like '%".$vague."%'";

        $state = self::$dbh->query($query);
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        if(count($row)>0) {
            foreach ($row as $get) {
                $artyid = $get['id'];
            }
            $querytwo = "select * from artical where artyid=".$artyid;
            $statetwo = self::$dbh->query($querytwo);
            $rowtwo = $statetwo->fetchAll(\PDO::FETCH_ASSOC);
            return $rowtwo;

        }else {
            return 0;
        }

    }


}
