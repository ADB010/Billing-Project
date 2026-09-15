<?php session_start();

// AI
if (isset($_SESSION['alert'])): 
    $msg = htmlspecialchars($_SESSION['alert']['message'], ENT_QUOTES, 'UTF-8');
    unset($_SESSION['alert']); // Clear it so it only shows once
    ?>
    <!-- Native Popup Dialog -->
    <dialog id="popupModal" style="border: none; border-radius: 8px; padding: 24px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); max-width: 400px; text-align: center;">
        <p style="font-size: 16px; margin-bottom: 20px;"><?= $msg; ?></p>
        <button onclick="document.getElementById('popupModal').close()" 
        style="padding: 8px 18px; border: none; border-radius: 4px; background: #007bff; color: white; cursor: pointer;">
        Close
    </button>
</dialog>

<!-- Automatically open as a backdrop modal -->
<script>
    document.getElementById('popupModal').showModal();
    </script>
<?php endif; ?>

<?php require_once 'partials/header.view.php';
    require_once '../controller/itemList.controller.php'; ?>

<body>
    <?php require_once '../controller/router/user.navigation.php' ?>
    <div class="container">
        <div class="form">
            <h1>Item Selection</h1>
            <form action="../controller/user.item.selection.php" method="post">
                <label for="item">Item:</label>

                <!-- <input type="text" id="item" name="item"><br><br> -->
                <select class="custom-select" name="item" id="item">
                    <option value="">Select an item</option>
                    <?php foreach ($results as $key => $value): ?>
                        <option value="<?php echo $value['item_name']; ?>"><?php echo $value['item_name']; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity"><br><br>              
                <input type="submit" name="submit" value="ADD MORE ITEMS">
                <input type="submit" name="submit" value="CHECKOUT">
            </form>
        </div>
    </div>
</body>
</html>

