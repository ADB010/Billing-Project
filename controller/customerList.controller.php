<?php
    require_once '../model/customer.database.con.php';

    $customer = new DbConnection("root", "", "customerinfo");
    $results = $customer->getCustomerList();