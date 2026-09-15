<?php
    session_start();
    require_once '../model/cart.database.php';
    require_once '../model/customer.database.con.php';
    require_once '../model/item.database.admin.php';

    $cart = new Cart();
    $item = new Items();
    $customer = new DbConnection("root", "", "Data");

        // empty declaration
    $customer_name = '';
    $cartInfo = array();
    $tax = 0;
    $total = 0;

    $customer_name = $_SESSION['username'];
    $customer_id = $_SESSION['user_id'];

    $cartInfo = $cart->fetchUserCartWithDetails($customer_id);
    $subtotal = 0;
    $discount = 0;

    foreach($cartInfo as $key=>$value){
        $subtotal += $value['price'];
        if($value['use_discount_price'] === 1){
            $discount += $value['order_quantity'] * ($value['price'] - $value['discount_price']);
        }
    }
    $tax = ($subtotal - $discount) * 0.04;
    $total = ($subtotal - $discount) + $tax;
    // echo $discount;
    // die();

    
    // echo "<pre>";
    // var_dump($cartInfo);
    // echo "<pre>";

    // die();


    
