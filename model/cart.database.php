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
                REFERENCES Data.customers(customer_id),
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
                echo '';
            }
            else{
                echo 'problem while inserting record';
            }
            $conn->close();
            return;
        }
        function fetchUserCart($id){
            $conn = $this->dbConnect();
            $sql = "SELECT * FROM cart WHERE customer_id = ?";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }
            else{
                echo "No Data found";
                
            } 
            $conn->close();
            return;
        }

        public function fetchUserCartWithDetails($customer_id) {
            $conn = $this->dbConnect();
            $sql = "SELECT c.order_quantity, i.* 
                    FROM cart c 
                    JOIN items i ON c.product_id = i.id 
                    WHERE c.customer_id = ?";
                    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $customer_id);
            $stmt->execute();
            
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

    }