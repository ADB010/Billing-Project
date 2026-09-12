<?php require_once 'partials/header.view.php' ?>

<body>
    <div class="container">
        <div class="form">
            <h1>Delete Customer</h1>
            <form action="../controller/admin.controller.php" method="post">
                <label for="name">Customer Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                
                <input type="submit" name="submit" value="REMOVE CUSTOMER">
                <a href="http://localhost:8080/Billing%20Project/view/customerList.view.php">View List</a>
            </form>
        </div>
    </div>
</body>
</html>