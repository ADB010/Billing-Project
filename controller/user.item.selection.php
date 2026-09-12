<?php
    session_start();
    require_once '../model/cart.database.php';
    require_once '../model/item.database.admin.php';
    require_once '../model/customer.database.con.php';

    $option = $_POST['submit'];
    $cart = new Cart();
    $cart->dbCreate();
    $cart->createCart();
    $customer = new DbConnection("root", "", 'customerinfo');
    $item = new Items();

    if($option == 'ADD MORE ITEMS'){
        $name = $_POST['item'];
        var_dump($name);
        $quantity = $_POST['quantity'];
        $customer_id = $_SESSION['user_id'];
        $result = $item->getItemID($name);
        $row = $result->fetch_assoc();
        $product_id = $row['id'];
        $cart->addItem($customer_id, $product_id, $quantity);

        $_SESSION['alert'] = [
            'type' => 'success', // or 'danger', 'info', etc.
            'message' => 'Item added to your cart.'
        ];
        
        header("Location: ../view/productSelect.view.php");
    }
    else{
        header("Location: ../view/receipt.view.php");
    }