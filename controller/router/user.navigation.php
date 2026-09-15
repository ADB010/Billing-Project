<?php
$currentPage = $currentPage ?? pathinfo(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), PATHINFO_FILENAME);
?>
<nav>
    <a class="<?= $currentPage === 'login.view' ? 'active' : '' ?>" href="http://localhost:8080/Billing%20Project/view/login.view.php">login</a>

    <a class="<?= $currentPage === 'itemList.view' ? 'active' : '' ?>" href="http://localhost:8080/Billing%20Project/view/itemList.view.php">Product List</a>

    <a class="<?= $currentPage === 'productSelect.view' ? 'active' : '' ?>" href="http://localhost:8080/Billing%20Project/view/productSelect.view.php">Select Product</a>
</nav>