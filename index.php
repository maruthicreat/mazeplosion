<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/indexcss.css">
    <link rel="stylesheet" href="css/signupcss.css">
</head>
<body>
<button style="float: right" onclick="open_signup()" id="signup_but">SIGN UP</button>

<div id="signup_area" style="display: none">
    <div id="hidesignup">
        <form id="signup_form">
            <div class="container">
                <h1>Sign Up</h1><p id="close_sign">x</p>
                <p>Please fill in this form to play this event .</p>
                <hr>
                <label><b>YOUR CODE</b></label>
                <input type="text" placeholder="Enter the Code" name="email" id="code_id" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="signup_pass" required>

                <label><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" id="signup_pass_conform" required>

                <div class="clearfix">
                    <button type="button" class="cancelbtn" onclick="close_this()">Cancel</button>
                    <button type="submit" class="signupbtn">Sign Up</button>
                </div>
                <div id="message"></div>
            </div>
        </form>
    </div>
</div>

<h1>MAZEPLOSION LOGIN</h1>
<form id="go" method="post" action="">
    <input type="text" name="username" placeholder="user id" id="u_id" value="CFFQOUTU" required>
    <input type="password" name="password" placeholder="password" id="pass_id" value="123" required>
    <input type="submit" value="click" id="go1">
</form>
<p id="mess"></p>
<div id="add">
    <h3 class='centertxt'>"LIFE ISN'T ABOUT FINDING PIECES OF A PUZZLE IT'S ABOUT CREATING AND
        PUTTING THOSE EXCEPTIONAL PIECES TOGETHER ."</h3>
    <p class='centertxt'>There is nothing called as clueless crime . It's your capacity to find the clue and
        find the crime . Here you are given with the clue now It's your turn to get ride off the maze with amazing answer .</p>
    <h3>INSTRUCTIONS</h3>
    <li>Only one student can be participate from each college .</li>
    <li>Initial points will be given (1000 pts).</li>
    <li>Participant should find a technical word related to the given technical words .</li>
    <li>Questions are comes under the technical words.</li>
    <li>Any abusive answer found will be strictly disqualified .</li>
    <h3>RULES</h3>
    <li>Search the words in google and then answer it.</li>
    <li>For Every hit your points will be reduced (-10 pts) .</li>
    <li>If the answer is right points will be added (+1000 pts) .</li>
    <li>If your point comes under zero(0 pts) you cant able to play further (Game Over). </li>
    <li>Any Illegal Activity found Entire College will Be Disqualified.</li>
    <h3>EVALUATION</h3>
    <li>The one who have the maximum point at the end of the event is the winner .</li>
    <li>Points are evaluated automatically .</li>
    <h3>DETAILS</h3>
    <li>CO-ORDINATOR :  MARUTHI RAJA S & ROSHINI I</li>
    <li>CONTACT      :  9487519679</li>
    <li>EMAIL        :  mazeplosion@citcyberfest.com</li>
</div>
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="js/signupjs.js"></script>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
session_start();
$uname = $_POST['username'];
$upass = $_POST['password'];

try {
    require 'connect.php';
    $q = "SELECT * FROM login WHERE login_id = :id AND password = :pass";
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
        //echo "elango";
        //echo "<p style='color: red'>login failed user id or password wrong !!!!</p>";
        echo "<script>$('#mess').html('login failed').fadeOut(2000);</script>";
    }
  }
  catch (PDOException $e)
  {
    error_log('PDOEXCP - '.$e->getMessage(),0);
    http_response_code(500);
    die('error establishing connection with database');
  }
}
?>
</body>
</html>
