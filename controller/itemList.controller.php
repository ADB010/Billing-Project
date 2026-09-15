<?php 
    require_once '../model/item.database.admin.php';
    
    $itemcon = new Items();
    $result = '';
    $results = $itemcon->getItemData();
