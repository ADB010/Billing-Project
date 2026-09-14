<?php
    session_start();
    require_once '../model/cart.database.php';
    require_once '../model/customer.database.con.php';
    require_once '../model/item.database.admin.php';

    $cart = new Cart();
    $item = new Items();
    $customer = new DbConnection("root", "", "Data");

    $customer_name = $_SESSION['username'];
    $customer_id = $_SESSION['user_id'];
    $results = $cart->fetchUserCart($customer_id);
    // echo "<pre>";
    // var_dump($cartInfo);
    // echo "<pre>";

    // $cartInfo = array();
    // foreach($results as $key=>$value){
    //    $cartInfo = array
    // }

    // $item->getItemData();
    // die();


    
