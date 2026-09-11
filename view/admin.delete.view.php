<?php require_once 'partials/header.view.php' ?>

<body>
    <div class="container">
        <div class="form">
            <h1>Delete Item</h1>
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

                <input type="submit" name="submit" value="REMOVE">
                <a href="http://localhost:8080/Billing%20Project/view/itemList.view.php">View List</a>
            </form>
        </div>
    </div>
</body>
</html>
