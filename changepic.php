<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$check = $_SESSION['checkvalue'];
$qid = $_SESSION['id'];
$ansid = $_POST['ansid'];
echo $check;
/*$h = date("h");
$m = date("i");
$s = date("s");
$dn = date("a");
$_SESSION['dncheck'] = 'pm';
$_SESSION['hcheck'] = '11';
$_SESSION['mcheck'] = '60';
echo $h.$m.$s.$dn;
$dncheck = $_SESSION['dncheck'];
$hcheck =  $_SESSION['hcheck'];
$mcheck =  $_SESSION['mcheck'];
echo $hcheck;*/
if($check === 'okok') {
    require 'connect.php';
    echo $qid;
    /* $ansed = "SELECT * from login WHERE login_id = :aid";
     $ast = $dbh->prepare($ansed);
     $ast->bindParam(':aid',$qid);
     $ast->execute();
     $anscol = $ast->fetchColumn(2);
     $ast->execute();
     $ipoint = $ast->fetchColumn(1);
     $anscolplus = $anscol + 1;*/
    $ansed = "SELECT * from login WHERE login_id = :aid";
    $ast = $dbh->prepare($ansed);
    $ast->bindParam(':aid', $qid);
    $ast->execute();
    $ansnum = $ast->fetch();
    $ans = $ansnum['answered'];
    $ipoint = $ansnum['points'];
    echo $ans;
    if ($ipoint > 0)
    {
        $dbs = "SELECT * from ans_check  WHERE ques_no = :id AND answer = :ans";
        $st = $dbh->prepare($dbs);
        $st->bindParam(':id', $ans);
        $st->bindParam(':ans', $ansid);
        $st->execute();
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $result = $st->fetchAll();
        if ($st->rowCount() == 1) {
            foreach ($result as $res) {

                echo "<img src='img/happy_smile.jpeg' class='smile'>";
                $anspls2 = $ans + 1;
                $dbs = "SELECT * from ans_check  WHERE ques_no = :id";
                $st = $dbh->prepare($dbs);
                $st->bindParam(':id', $anspls2);
                $st->execute();
                $cha = $st->fetch();
                $chaimg = $cha['qimage'];
                $hint = $cha['hints'];
                echo "<div id='hint_window'>
                <p align='center' id='hint_title'>HINTS</p>
                <hr>
                <p id='hint_view'>$hint</p>
               </div>";
                echo "changepic";
                echo $anspls2;
                // $img = $res['qimage'];
                //echo $chaimg;
                //echo $qid;
                echo "<img src='$chaimg'>";
                $apoint = $ipoint + 1000;
                echo "<p style='color: blue;position: absolute;font-size: 30px;left: 90%;top: 10%'>" . $apoint . "</p>";
                $updateans = "update login set answered = :ansval , points = :apoint  WHERE login_id = :pid";
                $ust = $dbh->prepare($updateans);
                $ust->bindParam(':ansval', $anspls2);
                $ust->bindParam(':apoint', $apoint);
                $ust->bindParam(':pid', $qid);
                $ust->execute();
                echo "<p id='right_entry' class='wrmsg'>you are right.</p>";
                echo "updated success";
                //$_SESSION['id'] = $qid + 1;
            }
        } else {

            echo "<img src='img/sad_smile.jpg' class='smile'>";
            $dbs = "SELECT * from ans_check  WHERE ques_no = :id";
            $st = $dbh->prepare($dbs);
            $st->bindParam(':id', $ans);
            $st->execute();
            $ch = $st->fetch();
            $chaimg = $ch['qimage'];
            $hint = $ch['hints'];
            echo "<div id='hint_window'>
                <p align='center' id='hint_title'>HINTS</p>
                <hr>
                <p id='hint_view'>$hint</p>
               </div>";
            echo "<img src='$chaimg'>";
            $apoint = $ipoint - 10;
            echo "<script>alert('$apoint');</script>";
            echo "<p style='color: blue;position: absolute;font-size: 30px;left: 90%;top: 10%'>" . $apoint . "</p>";
            $minans = "update login set points = :apoint  WHERE login_id = :pid";
            $ust = $dbh->prepare($minans);
            $ust->bindParam(':apoint', $apoint);
            $ust->bindParam(':pid', $qid);
            $ust->execute();
            echo "points reduced successfully";
            echo "<p id='wrong_entry' class='wrmsg'>you are wrong try once again.</p>";
        }
    }
    else{
        echo "<P style='color: red' id='game_over'>your points is comes to zero (GAME OVER).</P> ";
    }
}
else{
    echo 'go and login first';
}