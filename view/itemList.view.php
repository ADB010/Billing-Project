<?php
    session_start();
    require_once 'partials/header.view.php';
    require_once '../controller/itemList.controller.php';
    ?>
     
<body>
    <?php 
        if(isset($_SESSION['username']) && $_SESSION['username'] === 'admin' ){
            require_once '../controller/router/admin.navigation.php';
        }else{
            require_once '../controller/router/user.navigation.php';
        }?>
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
                    <td><?= htmlspecialchars($row['item_name']) ?></td>
                    <td><?= htmlspecialchars($row['price']) ?></td>
                    <td><?= htmlspecialchars($row['discount_price']) ?></td>
                    <?php if($row['use_discount_price'] == 0): ?>
                        <td>No</td>
                        <?php else: ?>
                            <td>Yes</td>
                    <?php endif; ?>
                    <td><?= htmlspecialchars($row['quantity'] )?></td>
                    <td><?= htmlspecialchars($row['catagorie']) ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
        <!-- <a href="http://localhost:8080/Billing%20Project/view/productSelect.view.php">Select Products</a> -->

        </div>
    </div>
</body>
</html>