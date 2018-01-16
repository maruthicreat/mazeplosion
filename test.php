<?php
session_start();
$uname = $_POST['username'];
$upass = $_POST['password'];

try {
    require 'connect.php';
    $q = "SELECT * from login WHERE login_id = :id AND password = :pass";
    $sth = $dbh->prepare($q);
    $sth->bindParam(':id', $uname);
    $sth->bindParam(':pass',$upass);
    $sth->execute();
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $result = $sth->fetchAll();
    $rowcount = $sth->rowCount();
    // echo $rowcount;

    if($rowcount == 1)
    {
        $_SESSION['checkvalue'] = 'okok';
        foreach ($result as $res) {
            $_SESSION['id'] = $res["login_id"];
        }
        echo "login successfull";
        header('Location: mypage.php');
    }
    else
    {
        //echo "<p style='color: red'>login failed user id or password wrong !!!!</p>";
        echo "<script>document.getElementById('mess').innerHTML = 'login failed';</script>";
    }
}
catch (PDOException $e)
{
    error_log('PDOEXCP - '.$e->getMessage(),0);
    http_response_code(500);
    die('error establishing connection with database');
}
