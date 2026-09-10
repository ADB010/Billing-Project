<?php
    require_once '../model/customer.login.database.php';
    

    $username = $_POST['fname'];
    $pass = $_POST['password'];
    $db = "customerinfo";   
    $email = $_POST['email'];
    
    $customer = new CustomerLoginDatabase("root", "", $db); // create a new object of the class
    
    $customer = ($customer->userCheck($pass, $email) == 1) ? "Logged In" : "Wrong Credentials";
    echo $customer;
    // if($customer->userCheck($pass, $email) == 1){
    //     echo "Logged In";
    // }
    // else{
    //     echo "Wrong Credentials";
    // }