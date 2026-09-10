<?php require_once 'partials/header.view.php' ?>

<body>
    <div class="container">
        <div class="form">
            <h1>Item Selection</h1>
            <form action="../controller/admin.controller.php" method="post">
                <label for="item">Item:</label>
                <input type="text" required><br><br>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required><br><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>

