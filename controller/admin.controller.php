<?php 
    require_once '../model/item.database.admin.php';
    $item_name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $catagorie = $_POST['catagorie'];

    $itemcon = new Items("root", "", "ItemsDB");
    $itemcon->dbCreate();
    $itemcon->createItemTable();
    $itemcon->insertItem($item_name, $price, $quantity, $catagorie);
    // $itemcon->deleteItemData($item_name);
    echo "<br>Complete";