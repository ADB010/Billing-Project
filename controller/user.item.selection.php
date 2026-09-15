<?php
    session_start();
    require_once '../model/cart.database.php';
    require_once '../model/item.database.admin.php';
    require_once '../model/customer.database.con.php';

    $option = trim($_POST['submit']);
    $cart = new Cart();
    $cart->dbCreate();
    $cart->createCart();
    $customer = new DbConnection("root", "", 'Data');
    $item = new Items();

    if($option == 'ADD MORE ITEMS'){
        $name = trim($_POST['item']);
        $quantity = trim($_POST['quantity']);
        $customer_id = trim($_SESSION['user_id']);
        $result = $item->getItemID($name);
        $row = $result->fetch_assoc();
        $product_id = trim($row['id']);
        $cart->addItem($customer_id, $product_id, $quantity);

        $_SESSION['alert'] = [
            'type' => 'success',
            'message' => 'Item added to your cart.'
        ];
        
        header("Location: ../view/productSelect.view.php");
    }
    else{
        header("Location: ../view/invoice.view.php");
    }