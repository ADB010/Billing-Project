<?php require_once 'partials/header.view.php' ?>
<?php
session_start();
//                                     AI

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

<body>
    <div class="container">
        <div class="form">
            <h1>Item Selection</h1>
            <form action="../controller/user.item.selection.php" method="post">
                <label for="item">Item:</label>
                <input type="text" id="item" name="item" required><br><br>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required><br><br>              
                <input type="submit" name="submit" value="ADD MORE ITEMS">
                <input type="submit" name="submit" value="CHECKOUT">
            </form>
        </div>
    </div>
</body>
</html>

