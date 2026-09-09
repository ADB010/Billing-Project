<?php
    require_once "../model/customer.database.con.php";

    $username = $_POST['fname'];
    $pass = $_POST['password'];
    $db = "customerInfo";   
    $email = $_POST['email'];

    $newCon = new DbConnection("admin", "gg", $db);
    $newCon->dbCreate();
    $newCon->createTable();
    $newCon->deleteCustomerData($username);
    // $newCon->insertData($username, $pass, $email);
    $results = $newCon->getCustomerData($username);

    foreach($results as $row){
        echo $row['customer_name'] . "<br>";
    }
    

    // header("Location: ../view/productInfo.view.php");
    

