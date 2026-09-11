<?php require_once 'partials/header.view.php' ?>

<body>
    <div class="container">
        <div class="form">
            <h1>Item Selection</h1>
            <form action="../controller/user.item.selection.php" method="post">
                <label for="item">Item:</label>
                <input type="text" required><br><br>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required><br><br>
                
                <input type="submit" value="ADD MORE ITEMS">
                <input type="submit" value="CHECKOUT">
            </form>
        </div>
    </div>
</body>
</html>

