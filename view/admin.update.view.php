<?php require_once 'partials/header.view.php' ?>

<body>
    <div class="container">
        <div class="form">
            <h1>Update Offer</h1>
            <form action="../controller/admin.controller.php" method="post">
                <label for="item">Item:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="offer">Offer Price:</label>
                <input type="text" id="offer" name="offer" placeholder="IN 2 POINT DECIMAL" required><br><br>

                <div class="radio-group">
                    <label class="radio-option" for="enable">
                        <input type="radio" id="enable" name="bool" value="1">
                        <span>Enable Offer</span>
                    </label>
                    <label class="radio-option" for="disable">
                        <input type="radio" id="disable" name="bool" value="0">
                        <span>Disable Offer</span>
                    </label>
                </div>

                <input type="submit" name="submit" value="UPDATE">
                <a href="http://localhost:8080/Billing%20Project/view/itemList.view.php">View List</a>
            </form>
        </div>
    </div>
</body>
</html>
