<?php require_once 'partials/header.view.php';
    require_once '../controller/itemList.controller.php';
     $results = $itemcon->getItemData();?>
     
<body>
    <div class="container">
        <div class="table">

        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Offer Price</th>
                <th>Offer Status</th>
                <th>Available Quantity</th>
                <th>Catagorie</th>
            </tr>
            <?php foreach($results as $row ): ?>
                <tr>
                    <td><?= $row['item_name'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['discount_price'] ?></td>
                    <?php if($row['use_discount_price'] == 0): ?>
                        <td>Yes</td>
                        <?php else: ?>
                            <td>No</td>
                    <?php endif; ?>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= $row['catagorie'] ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
        <a href="http://localhost:8080/Billing%20Project/view/productSelect.view.php">Select Products</a>

        </div>
    </div>
</body>
</html>