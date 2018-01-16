<?php
session_start();
$qid = $_SESSION['id'];
$check = $_SESSION['checkvalue'];

if($check === 'okok') {
    require 'connect.php';
    echo $qid;
    $ansed = "SELECT * from login WHERE login_id = :aid";
    $ast = $dbh->prepare($ansed);
    $ast->bindParam(':aid',$qid);
    $ast->execute();
    echo $ast->rowCount();
    $ansnum = $ast->fetch();
    $ipoint = $ansnum['points'];
    $anscol = $ansnum['answered'];
    echo $anscol;
    echo $ipoint;
    echo "<p style='color: blue;position: absolute;font-size: 30px;left: 90%;top: 10%'>".$ipoint."</p>";
    $dbs = "SELECT * from ans_check WHERE ques_no = :id";
    $st = $dbh->prepare($dbs);
    $st->bindParam(':id', $anscol);
    //$st->bindParam(':ans', $ansid);
    $st->execute();
    echo $st->rowCount();
    $st->setFetchMode(PDO::FETCH_ASSOC);
    $result = $st->fetchAll();
    foreach ($result as $res) {
        echo "setimg";
        $img = $res['qimage'];
        $hint = $res['hints'];
        echo $qid;
        echo "<div id='hint_window'>
                <p align='center' id='hint_title'>HINTS</p>
                <hr>
                <p id='hint_view'>$hint</p>
               </div>";
        echo "<img src='$img'>";
        //$_SESSION['id'] = $qid + 1;
    }
}
else{
    echo 'go and login first';
}