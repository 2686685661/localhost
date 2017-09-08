<?php

    class articleoperate{
        
        function insertinto($content,$img,$issuetime){
            
            include "link.php";
            $query="INSERT INTO article(content,img,issuetime) VALUES (?,?,?)";
            $stmt=$dbh->prepare($query);

            $stmt->bindParam(1,$content);
            $stmt->bindParam(2,$img);
            $stmt->bindParam(3,$issuetime);

            $stmt->execute();   
        }

        function delete($id){
            include "link.php"; 
            $query="DELETE FROM article WHERE id=?";
            $stmt=$dbh->prepare($query);
            $stmt->bindParam(1,$id);

            $stmt->execute();
        }

        function select(){
            include "link.php";
            $stmt=$dbh->query("SELECT content,img,issuetime,likenumber FROM article");

            while(list($content,$img,$issuetime,$likenumber)=$stmt->fetch(PDO::FETCH_NUM)){
                echo $content.'</br>';
                echo $img.'</br>';
                echo $issuetime.'</br>';
                echo $likenumber.'</br>';
                echo '</br>';
            }
        }

        function update($content,$id){
            include "link.php";

            $query="UPDATE article SET content=? WHERE id=?";
            $stmt=$dbh->prepare($query);
            
            $stmt->bindParam(1,$content);
            $stmt->bindParam(2,$id);

            $stmt->execute();
        }

    }

    $person =new articleoperate();
    $person->update("dkfjklsjfkljakldsjfkldfadsfasdfsdf",13);

?>