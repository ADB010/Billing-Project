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
                    <h1><?= $customer_name ?></h1>
                </div>

                <div class="invoice-meta">
                    <p><span>Date</span> <strong>2026-09-14</strong></p>
                    <p><span>Invoice #</span> <strong>INV-1001</strong></p>
                </div>
            </div>

            <div class="invoice-table">
                <div class="invoice-row invoice-head">
                    <span>Sr.</span>
                    <span>Product</span>
                    <span>Quantity</span>
                    <span>Price</span>
                    <span>Total</span>
                </div>
                <?php foreach($results as $key=>$value):?>
                    <div class="invoice-row">
                        <span><?= $value['id'] ?></span>
                        <span><?= $value['product_id'] ?></span>
                        <span><?= $value['order_quantity'] ?></span>
                        <span><?= 44 ?></span>
                        <span><?= $value['order_quantity'] * 44 ?></span>
                    </div>
                <?php endforeach; ?>
                <!-- <div class="invoice-row">
                    <span>Product 2</span>
                    <span>2</span>
                    <span>$15.00</span>
                    <span>$30.00</span>
                </div>

                <div class="invoice-row">
                    <span>Product 3</span>
                    <span>3</span>
                    <span>$10.00</span>
                    <span>$30.00</span>
                </div> -->
            </div>

            <div class="invoice-summary">
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>$80.00</span>
                </div>
                <div class="summary-row">
                    <span>Discount</span>
                    <span>$10.00</span>
                </div>
                <div class="summary-row">
                    <span>Tax</span>
                    <span>$7.00</span>
                </div>
            </div>

            <div class="invoice-total">
                <span>Total</span>
                <strong>$77.00</strong>
            </div>
        </div>
    </div>
</body>
</html>