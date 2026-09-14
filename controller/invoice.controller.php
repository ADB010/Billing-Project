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

    $cartInfo = $cart->fetchUserCartWithDetails($customer_id);


    // foreach($results as $key=>$value){
    //     $itemData = $item->searchItem($value['product_id']);
    //     if ($itemData) {
    //         $cartInfo[] = $itemData;
    //     }
    // }
    
    // echo "<pre>";
    // var_dump($cartInfo);
    // echo "<pre>";

    // die();


    
