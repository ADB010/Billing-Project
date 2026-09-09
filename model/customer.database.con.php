<?php
    require_once '../controller/userRegistration.controller.php';
    class DbConnection{
        protected $servername = "localhost";
        protected $username;
        protected $password;
        protected $dbname;

        function __construct($username, $password, $dbname){
            $this->username = $username; 
            $this->password = $password;
            $this->dbname = $dbname;
        }

        // function createUser(){

        // }

        public function dbCreate(){

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

        function createTable(){
            $conn = $this->dbConnect();

            $sql = "CREATE TABLE IF NOT EXISTS customers(
            customer_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            customer_name VARCHAR(30) NOT NULL,
            pass VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

            if($conn->query($sql) === TRUE){
                echo "Table Created<br>";
            }
            else{
                echo "Error Creating Table: " . mysqli_error($conn);
            }
            $conn->close();
            return;
        }

        function insertData($name, $pass, $email){
            $conn = $this->dbConnect();
            $sql = "INSERT INTO customers (customer_name, pass, email) VALUES (?, ?, ?)";

            if($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sss", $name, $pass, $email);
                $stmt->execute();
                echo "New records created successfully<br>";
            }
            else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
            return;
        }
        function getCustomerData($name){
            $conn = $this->dbConnect();
            $sql = "SELECT customer_id, customer_name, email, reg_date FROM customers WHERE customer_name = '$name'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return $result;
            }
            else{
                echo "No Data found";
                
            } 
            $conn->close();
        }
    }   

   
    