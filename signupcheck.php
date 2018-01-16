<?php
date_default_timezone_set('Asia/Kolkata');
require 'connection.php';
require 'connect.php';
$user_id = $_POST['codeid'];
$pass = $_POST['signup_pass'];
$conf_pass = $_POST['signup_pass_conform'];

echo $user_id.$pass.$conf_pass;

if ($pass == $conf_pass) {
    $sql = 'select * from participants WHERE UserId = :uid';
    $cydb = $cyb->prepare($sql);
    $cydb->bindParam(':uid', $user_id);
    $cydb->execute();
    /*$cydb->setFetchMode(PDO::FETCH_ASSOC);
    $result = $cydb->fetchAll();
    foreach ($result as $res) {
        echo $res['Register_Code'];
    }*/
    $f = $cydb->fetch();
    echo $f['Register_Code'];
    if ($f) {
        try {
            $regcode = $f['Register_Code'];
            $name = $f['Name'];
            $coll_name = $f['College_Name'];
            $mail_id = $f['Email'];
            $phone_no = $f['Phno'];
            $now = date('Y-m-d H:i:s');
            $score = 1000;
            $num = 0;
            echo $regcode . $name . $coll_name . $mail_id . $phone_no.$now;
            $ins = 'Insert into login (login_id,password,college_name,college_id,Names,points,answered,last_submit_time) VALUES (:userid,:pass,:coll_name,:regcode,:name,:score,:num,:now)';
            $sst = $dbh->prepare($ins);
            $sst->bindParam(':userid', $user_id);
            $sst->bindParam(':pass', $pass);
            $sst->bindParam(':coll_name', $coll_name);
            $sst->bindParam(':regcode', $regcode);
            $sst->bindParam(':name', $name);
            $sst->bindParam(':score', $score);
            $sst->bindParam(':num', $num);
            $sst->bindParam(':now', $now);
            $sst->execute();
        }
        catch (PDOException $e)
        {
            echo "<p style='color: red;'>Only one member can play per College Sorry !!!!</p>";
            echo $e->getMessage();
        }
    } else {
        echo '<p style="color: red">User id wrong !!!</p>';
    }
}
else{
    echo '<p style="color: red">Pls Check your Password !!!</p>';
}