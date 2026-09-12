<?php 

    class Items{
        protected string $servername = "localhost";
        protected string $username = 'root';
        protected string $password = '';
        protected string $dbname = 'iteminfo';

        function dbCreate(){

            $conn = new mysqli(
                $this->servername, 
                $this->username, 
                $this->password);

            if($conn->connect_error){
                die("Connection Failed: " . $conn->connect_error);
            }
            else{
                echo "Connection Succesfull<br>";
            }
            $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
            if($conn->query($sql) === TRUE)    {
                echo "Database Created<br>";
            }
            else{
                echo "Error Creating Database: " . $conn->error;
            }
            $conn->close();
            return;
        }

        function dbConnect(){
            
            $conn = new mysqli(
                $this->servername, 
                $this->username, 
                $this->password, 
                $this->dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            return $conn;
        }

        function createItemTable(){
            $conn = $this->dbConnect();

            $sql = "CREATE TABLE IF NOT EXISTS items(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            item_name VARCHAR(30) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            discount_price DECIMAL(10, 2) NULL,
            use_discount_price TINYINT(1) DEFAULT 0,
            quantity INT(10),            
            catagorie VARCHAR(30) DEFAULT 'Stock',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            if($conn->query($sql) === TRUE)    {
                echo "Table Created<br>";
            }
            else{
                echo "Error Creating Table: " . $conn->error;
            }
            $conn->close();
            return;
        }
        
        function insertItem($name, $price ,$offerPrice, $quantity, $catagorie){
            $conn = $this->dbConnect();
            $sql = "INSERT INTO items (item_name, price, discount_price, quantity, catagorie) VALUES (?, ?, ?, ?, ?)";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param('sddis', $name, $price, $offerPrice, $quantity, $catagorie);
                $stmt->execute();
                echo 'New Record Added Successfully';
            }
            else{
                echo 'problem while inserting record';
            }
            $conn->close();
            return;
        }

        function searchItem($name){
            $conn = $this->dbConnect();
            $sql = "SELECT * FROM items WHERE item_name = '$name'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return $result;
            }
            else{
                echo "No Data found";
                
            } 
            $conn->close();
            return;
        }

        function deleteItemData($name){
            $conn = $this->dbConnect();
            $sql = "DELETE FROM items WHERE item_name = '$name'";
            if($conn->query($sql) === TRUE){
                echo "<br>Record deleted successfully<br>";
            }
            else{
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
            return;
        }

        function getItemData(){
            $conn = $this->dbConnect();
            $sql = "SELECT * FROM items";
            $results = $conn->query($sql);
            if($results->num_rows > 0){
                return $results;
            }
            else{
                echo "No Data found";
                
            } 
            $conn->close();
            return;
        }

        function getItemID($name){
            $conn = $this->dbConnect();
            $sql = "SELECT id FROM items WHERE item_name = '$name'";
            $results = $conn->query($sql);
            if($results->num_rows > 0){
                return $results;
            }
            else{
                echo "No Data found";
                
            } 
            $conn->close();
            return;
        }

        // function updateOffer(String $name, Float $newOffer, Int $bool){
        //     $conn = $this->dbConnect();
        //     $sql = "UPDATE items SET discount_price = ?, use_discount_price = ? WHERE item_name = ?";

        //     if($stmt = $conn->prepare($sql)){
        //         $stmt->bind_param('dis', $newOffer, $bool, $name);
        //         $stmt->execute();
        //         echo 'New Record Added Successfully';
        //     }
        //     else{
        //         echo 'problem while inserting record';
        //     }
        //     $conn->close();
        //     return;
        // }
        function updateOffer(String $name, Int $bool, Float $newOffer = null){
            $conn = $this->dbConnect();
            if($newOffer !== null){
                $sql = "UPDATE items SET discount_price = ?, use_discount_price = ? WHERE item_name = ?";

                if($stmt = $conn->prepare($sql)){
                    $stmt->bind_param('dis', $newOffer, $bool, $name);
                    $stmt->execute();
                    echo 'New Record Updated Successfully';
                }
                else{
                    echo 'problem while inserting record';
                }
            }
            else{
                $sql = "UPDATE items SET use_discount_price = ? WHERE item_name = ?";

                if($stmt = $conn->prepare($sql)){
                    $stmt->bind_param('is', $newOffer, $bool, $name);
                    $stmt->execute();
                    echo 'New Record Updated Successfully';
                }
                else{
                    echo 'problem while inserting record';
                }
            }  
            $conn->close();
            return;
        }

        function updateQuantity($newQuantity, $name){
            $conn = $this->dbConnect();
            $sql = "UPDATE items SET quantity = ? WHERE item_name = ?";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param('is', $newQuantity, $name);
                $stmt->execute();
                echo 'New Record Added Successfully';
            }
            else{
                echo 'Problem while inserting record';
            }
            $conn->close();
            return;
        }
    }