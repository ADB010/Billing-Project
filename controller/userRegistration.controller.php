<?php
    require_once "../model/database.con.php";

    $username = $_POST['fname'];
    $pass = $_POST['password'];
    $db = "customerInfo";   

    $newCon = new DbConnection("admin", "gg", $db);
    $newCon->dbCreate();
    $newCon->createTable();


