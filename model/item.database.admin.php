<?php 

    class Items{
        protected string $servername = "localhost";
        protected string $username;
        protected string $password;
        protected string $dbname;

        function __construct($username, $password, $dbname){
            $this->username = $username; 
            $this->password = $password;
            $this->dbname = $dbname;
        }

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
            price DECIMAL(10,2) NOT NULL,
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
        
        function insertItem($name, $price, $quantity){
            $conn = $this->dbConnect();
            $sql = "INSERT INTO items (item_name, price, quantity) VALUES (?, ?, ?)";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param('sss', $name, $price, $quantity);
                $stmt->execute();
                echo 'New Record Added Successfully';
            }
            else{
                echo 'problem while inserting record';
            }
            $conn->close();
            return;
        }
        function getItemData($name){
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
                echo "Record deleted successfully<br>";
            }
            else{
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
            return;
        }
    }