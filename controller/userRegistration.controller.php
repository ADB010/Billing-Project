<?php
    require_once "../model/customer.database.con.php";

    $username = $_POST['fname'];
    $pass = $_POST['password'];
    $db = "customerInfo";   
    $email = $_POST['email'];

    $newCon = new DbConnection("admin", "gg", $db);
    $newCon->dbCreate();
    $newCon->createTable();
    $newCon->insertData($username, $pass, $email);

    header("Locarion: ../view/productInfo.php");
    

