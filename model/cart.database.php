<?php
    require_once 'item.database.admin.php';
    class Cart extends Items{
        
        function createCart(){
            $conn = $this->dbConnect();

            $sql = "CREATE TABLE IF NOT EXISTS cart(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            -- customer_name VARCHAR(30) NOT NULL,
            customer_id INT(6) UNSIGNED NOT NULL,
            -- product_name VARCHAR(30) NOT NULL,
            product_id INT(6) UNSIGNED NOT NULL,
            order_quantity INT NOT NULL,
            FOREIGN KEY (customer_id)
                REFERENCES customerinfo.customers(customer_id),
            FOREIGN KEY (product_id)
                REFERENCES items(id))";

            if($conn->query($sql) === TRUE)    {
                echo "Table Created<br>";
            }
            else{
                echo "Error Creating Table: " . $conn->error;
            }
            $conn->close();
            return;

        }

        function addItem($customer_id, $product_id, $quantity) {
            $conn = $this->dbConnect();
            $sql = "INSERT INTO cart (customer_id, product_id, order_quantity) VALUES (?, ?, ?)";
            
            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param('iii', $customer_id, $product_id, $quantity);
                $stmt->execute();
                echo 'New Record Added Successfully';
            }
            else{
                echo 'problem while inserting record';
            }
            $conn->close();
            return;
        }



    }