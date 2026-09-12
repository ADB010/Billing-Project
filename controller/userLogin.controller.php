<?php
    session_start();
    require_once '../model/customer.login.database.php';
    
    $username = $_POST['fname'];
    $pass = $_POST['password'];
    $db = "customerinfo";   
    $email = $_POST['email'];
    $_SESSION['username'] = $username;
    
    $customer = new CustomerLoginDatabase("root", "", $db); // create a new object of the class
    $message = ($customer->userCheck($pass, $email) == 1) ? "Logged In" : "Wrong Credentials";
    $result = $customer->getCustomerData($username);    
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['customer_id'];

    header("Location: ../view/itemList.view.php");

    // if($customer->userCheck($pass, $email) == 1){
    //     echo "Logged In";
    // }
    // else{
    //     echo "Wrong Credentials";
    // }