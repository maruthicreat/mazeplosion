<?php
$dbh = new PDO('mysql:host=localhost;dbname=mazlogin', 'root', 'MaruthiRaja');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);