<?php require_once  '../controller/invoice.controller.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="invoice.style.css">
</head>
<body>
    <div class="invoice-page">
        <div class="invoice-card">
            <div class="invoice-header">
                <div>
                    <p class="eyebrow">Invoice</p>
                    <h1><?= htmlspecialchars($customer_name) ?></h1>
                </div>

                <div class="invoice-meta">
                    <p><span>Date</span> <strong><?= date('Y-m-d'); ?></strong></p>
                    <p><span>Invoice #</span> <strong>INV-1001</strong></p>
                </div>
            </div>

            <div class="invoice-table">
                <div class="invoice-row invoice-head">
                    <span>Product</span>
                    <span>Price</span>
                    <span>Quantity</span>
                    <span>Total</span>
                </div>
                <?php foreach($cartInfo as $key=>$value):?>
                    <div class="invoice-row">
                        <span><?= htmlspecialchars($value['item_name']) ?></span>
                        <span>
                            <!-- Add an if condition to check if the discount is enabled then show appropriate price -->
                            <?= htmlspecialchars($value['price']) ?> 
                        </span>
                        <span><?= htmlspecialchars($value['order_quantity']) ?></span>
                        <span><?= htmlspecialchars($value['order_quantity'] * $value['price']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="invoice-summary">
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span><?= $subtotal ?></span>
                </div>
                <div class="summary-row">
                    <span>Discount</span>
                    <span><?= htmlspecialchars($discount) ?></span>
                </div>
                <div class="summary-row">
                    <span>Tax</span>
                    <span><?= htmlspecialchars($tax) ?></span>
                </div>
            </div>

            <div class="invoice-total">
                <span>Total</span>
                <strong><?= htmlspecialchars($total) ?></strong>
            </div>
        </div>
    </div>
</body>
</html>