<?php
session_start();
$qid = $_SESSION['id'];
$check = $_SESSION['checkvalue'];

if($check === 'okok') {
    require 'connect.php';
    $scores = "select * from login ORDER BY points DESC LIMIT 3 ";
    $sst = $dbh->prepare($scores);
    $sst->execute();
    $result = $sst->fetchAll();
    foreach ($result as $res) {
        $s = $res['college_name'];
        $r = $res['points'];
        echo $s.'&nbsp;&nbsp=&nbsp'.$r."<br><br><br>";
    }
}
else{
    echo 'go and login first';
}