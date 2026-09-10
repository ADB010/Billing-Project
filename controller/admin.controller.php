<?php 
    require_once '../model/item.database.admin.php';

    $itemcon = new Items("admin", "gg", "ItemsDB");
    $itemcon->dbCreate();
    $itemcon->createItemTable();
    // $itemcon->