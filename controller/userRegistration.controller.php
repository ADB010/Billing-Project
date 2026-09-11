<?php
    require_once "../model/customer.database.con.php";
    require_once '../model/customer.login.database.php';

    $username = $_POST['fname'];
    $pass = $_POST['password'];
    $db = "customerInfo";   
    $email = $_POST['email'];

    $customer = new CustomerLoginDatabase("root", "", $db);
    if($customer->userCheck(0, $email) === 1){
        echo "User Already Exists";
        die();
    }

    $newCon = new DbConnection("root", "", $db);
    $newCon->dbCreate();
    $newCon->createTable();
    
    
    $newCon->insertData($username, $pass, $email);
    $results = $newCon->getCustomerData($username);

    foreach($results as $row){
        echo $row['customer_name'] . "<br>";
        
    }
    

    header("Location: ../view/login.view.php");
    

