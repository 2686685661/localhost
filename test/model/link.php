<?php
    $dsn='mysql:dbname=blogs;charset=utf8;host=localhost';
    $user='root';
    $password='1198219721';
    try{
        $dbh=new PDO($dsn,$user,$password);
    }catch(PDOException $e){
        echo '数据库链接失败：'.$e->getMessage();
        exit;
    }

    // $query="UPDATE personaldetails SET phone='13400000002' where name='adf'";
    // $affected=$dbh->exec($query);
    // if($affected){
    //     echo '数据表contactinof中'.$affected;
    // }else{
    //     print_r($dbh->personaldetails);
    // }




    // $query ="SELECT name,phone,hobby FROM personaldetails WHERE profession='学生'";
    
    // try{
    //     $pdostatement = $dbh->query($query);
    //     echo "一共从表中获取到".$pdostatement->rowCount()."条记录:</br>";
    //     foreach ($pdostatement as $row){
    //         echo $row['name']."\t";
    //         echo $row['phone']."\t";
    //         echo $row['hobby']."</br>";
    //     }
    // }catch(PDOException $e){
    //         echo '数据库链接失败：'.$e->getMessage();
    //  }




    // $query="INSERT INTO article(content,img,issuetime) VALUES (?,?,?)";
    // $stmt=$dbh->prepare($query);

    // $stmt->bindParam(1,$content);
    // $stmt->bindParam(2,$img);
    // $stmt->bindParam(3,$issuetime);

    // $content="fdsajkj;jdsfj;kdlsjfl;asdjf;lsdjf;lsdjf;lsdkjflksdjfljsdfljalfjsd;lfjoisdfjsdjfsdghdsghdsghai";
    // $img="a.jpg";
    // $issuetime="54565";

    // $stmt->execute();
    


    // echo '<table border="1" align="center" width=90%>';
    // echo '<caption><h1>联系人</h1></caption>';
    // echo '<tr bgcolor="#ccc">';
    // echo '<th>name</th><th>出生日期</th><th>手机</th><th>职业</th><th>爱好</th><th>邮件</th>';

    // $stmt=$dbh->query("SELECT name,dateofbirth,phone,profession,hobby,mailbox FROM personaldetails");

    // while(list($name,$dateofbirth,$phone,$profession,$hobby,$mailbox)=$stmt->fetch(PDO::FETCH_NUM)){
    //     echo '<tr>';
    //     echo '<td>'.$name.'</td>';
    //     echo '<td>'.$dateofbirth.'</td>';
    //     echo '<td>'.$phone.'</td>';
    //     echo '<td>'.$profession.'</td>';
    //     echo '<td>'.$hobby.'</td>';
    //     echo '<td>'.$mailbox.'</td>';
    //     echo '</tr>';
    // }
    // echo '</table>';

    
    
?>