<?php
    session_start();
    require_once '../model/customer.login.database.php';
    
    $username = trim($_POST['fname']);
    $pass = trim($_POST['password']);
    $db = "Data";   
    $email = trim($_POST['email']);

    $customer = new CustomerLoginDatabase("root", "", $db); // create a new object of the class
    $message = ($customer->userCheck($pass, $email, $username) === true) ? "Logged In" : "Wrong Credentials";
    if($message === "Logged In"){
        $result = $customer->getCustomerData($username);    
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['customer_name'];
        $_SESSION['user_id'] = $row['customer_id'];

        header("Location: ../view/itemList.view.php");
    }
    else{
        echo $message;
        die();
    }
    

    // if($customer->userCheck($pass, $email) == 1){
    //     echo "Logged In";
    // }
    // else{
    //     echo "Wrong Credentials";
    // }