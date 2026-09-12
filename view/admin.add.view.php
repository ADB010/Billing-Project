<?php require_once 'partials/header.view.php' ?>

<body>
    <div class="container">
        <div class="form">
            <h1>Add Product</h1>
            <form action="../controller/admin.controller.php" method="post">
                <label for="item">Item:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="catagorie">Product Catagorie:</label>

                <select class="select" name="catagorie" id="catagorie" required>
                    <option value="Food">Food</option>
                    <option value="Perishible">Perishible</option>
                    <option value="Non-Perishible">Non-Perishible</option>
                    <option value="Electronic">Electronic</option>
                    <option value="Kitchen">Kitchen</option>
                </select>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" placeholder="IN 2 POINT DECIMAL" required><br><br>
                <label for="offer">Offer Price:</label>
                <input type="text" id="offer" name="offer" placeholder="IN 2 POINT DECIMAL" required><br><br>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required><br><br>

                <input type="submit" name="submit" value="ADD">
                <a href="http://localhost:8080/Billing%20Project/view/itemList.view.php">View List</a>
            </form>
        </div>
    </div>
</body>
</html>