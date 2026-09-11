<?php
    require_once '../model/cart.database.php';

    $option = $_POST['submit'];
    $cart = new Cart();
    $cart->dbCreate();
    $cart->createCart();

    if($option == 'add'){

    }