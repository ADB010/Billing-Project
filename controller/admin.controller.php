<?php 
    require_once '../model/item.database.admin.php';
    $item_name = $_POST['name'];
    $catagorie = $_POST['catagorie'];
    $submit = $_POST['submit'];

    $itemcon = new Items("root", "", "ItemsDB");

    switch($submit){
        case 'ADD':
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $itemcon->insertItem($item_name, $price, $quantity, $catagorie);            
            break;

        case 'REMOVE':
            $itemcon->deleteItemData($item_name);
            break;
            
        default:
            echo "No Tasks";
    }

    // $itemcon->dbCreate();
    // $itemcon->createItemTable();
    // $itemcon->insertItem($item_name, $price, $quantity, $catagorie);
    // $itemcon->deleteItemData($item_name);
    // echo "<br>Complete";