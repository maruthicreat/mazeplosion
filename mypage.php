<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="css/mypagecss.css" rel="stylesheet">
    <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<div id="timer"></div>
<p id="scview">YOUR SCORE</p>
<div id="report"></div>
<div id="score_board">
    <p align="center" style="color:white;">TOP 3 SCORE </p>
    <hr>
    <p id="score_card"></p>
</div>
<form id="anscheckform">
    <input type="text" name="anstext" placeholder="Type a Word to be Related to these Words ." id="ansid" required>
    <input type="submit" name="check" id="click">
</form>
<script type="text/javascript" src="timercount.js"></script>
</body>
</html>