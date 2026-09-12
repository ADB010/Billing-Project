<?php
    require_once 'item.database.admin.php';
    class Cart extends Items{
        // protected string $servername = 'localhost';
        // protected string $username = 'root';
        // protected string $password = '';
        // protected string $dbname = 'cartDB';

        // function dbConnect(){
            
        //     $conn = new mysqli(
        //         $this->servername, 
        //         $this->username, 
        //         $this->password, 
        //         $this->dbname);

        //     if ($conn->connect_error) {
        //         die("Connection failed: " . $conn->connect_error);
        //     }
        //     return $conn;
        // }

        // public function dbCreate(){

        //     $conn = new mysqli(
        //         $this->servername, 
        //         $this->username, 
        //         $this->password);

        //     if($conn->connect_error){
        //         die("Connection Failed: " . $conn->connect_error);
        //     }
        //     else{
        //         echo "Connection Succesfull<br>";
        //     }
        //     $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
        //     if($conn->query($sql) === TRUE)    {
        //         echo "Database Created<br>";
        //     }
        //     else{
        //         echo "Error Creating Database: " . $conn->error;
        //     }
        //     $conn->close();
        //     return;
        // }

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