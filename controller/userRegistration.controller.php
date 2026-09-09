<?php
    require_once "../model/database.con.php";

    $username = $_POST['fname'];
    $pass = $_POST['password'];
    $db = "userInfo";   

    $newCon = new DbConnection($username, $pass, $db);
    

