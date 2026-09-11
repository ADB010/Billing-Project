<?php require_once 'partials/header.view.php';
    require_once '../controller/itemList.controller.php';
     $results = $itemcon->gerItemData();?>
     
<body>
    <div class="container">
        <div class="table">

        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Available Quantity</th>
                <th>Catagorie</th>
            </tr>
            <?php foreach($results as $row ): ?>
                <tr>
                    <td><?= $row['item_name'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= $row['catagorie'] ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

        </div>
    </div>
</body>
</html>