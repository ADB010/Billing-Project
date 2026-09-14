<?php
$currentPage = $currentPage ?? pathinfo(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), PATHINFO_FILENAME);
?>
<nav>
    <a class="<?= $currentPage === 'login.view' ? 'active' : '' ?>" href="http://localhost:8080/Billing%20Project/view/login.view.php">login</a>

    <a class="<?= $currentPage === 'itemList.view' ? 'active' : '' ?>" href="http://localhost:8080/Billing%20Project/view/itemList.view.php">Product List</a>

    <a class="<?= $currentPage === 'admin.add.view' ? 'active' : '' ?>" href="http://localhost:8080/Billing%20Project/view/admin.add.view.php">Add Product</a>

    <a class="<?= $currentPage === 'admin.delete.view' ? 'active' : '' ?>" href="http://localhost:8080/Billing%20Project/view/admin.delete.view.php">Delete Products</a>

    <a class="<?= $currentPage === 'admin.update.view' ? 'active' : '' ?>" href="http://localhost:8080/Billing%20Project/view/admin.update.view.php">Update Offer</a>

    <a class="<?= $currentPage === 'customerList.view' ? 'active' : '' ?>" href="http://localhost:8080/Billing%20Project/view/customerList.view.php">Customer List</a>

    <a class="<?= $currentPage === 'admin.customer.delete' ? 'active' : '' ?>" href="http://localhost:8080/Billing%20Project/view/admin.customer.delete.php">Remove Customer</a>
</nav>