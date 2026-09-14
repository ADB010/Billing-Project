<?php
    require_once "../model/customer.database.con.php";
    require_once '../model/customer.login.database.php';

    $username = $_POST['fname'];
    $pass = $_POST['password'];
    $db = "Data";   
    $email = $_POST['email'];
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    $customer = new CustomerLoginDatabase("root", "", $db);
    $customer->dbCreate();
    $customer->createTable();
    if($customer->userCheck(0, $email, $username) === 1){
        echo "User Already Exists";
        die();
    }

    $newCon = new DbConnection("root", "", $db);
    $newCon->dbCreate();
    $newCon->createTable();
    
    
    $newCon->insertData($username, $hashedPassword, $email);
    // $results = $newCon->getCustomerData($username);

    // foreach($results as $row){
    //     echo $row['customer_name'] . "<br>";
        
    // }

    header("Location: ../view/login.view.php");
    

