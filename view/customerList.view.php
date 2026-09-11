<?php require_once 'partials/header.view.php';?>

<body>
    <div class="container">
        <div class="table">

        <table>
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>email</th>
                <th>Reg. Date</th>
            </tr>
            <?php foreach($results as $row ): ?>
                <tr>
                    <td><?= $row['customer_id'] ?></td>
                    <td><?= $row['customer_name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['reg_date'] ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

        </div>
    </div>
</body>
</html>