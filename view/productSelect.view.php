<?php require_once 'partials/header.view.php' ?>

<body>
    <div class="container">
        <div class="form">
            <h1>Item Selection</h1>
            <form action="../controller/user.item.selection.php" method="post">
                <label for="item">Item:</label>
                <input type="text" id="item" name="item" required><br><br>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required><br><br>
                
                <input type="submit" name="add" value="ADD MORE ITEMS">
                <input type="submit" name="checkout" value="CHECKOUT">
            </form>
        </div>
    </div>
</body>
</html>

