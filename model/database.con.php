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
        }

        function insertData($name, $pass, $email){
            $conn = $this->dbConnect();
            $sql = "INSERT INTO customers (customer_name, pass, email) VALUES (?, ?, ?)";

            if($conn->query($sql) === TRUE){
                echo "Insert Successful<br>";
            }
            else{
                echo "Error During Insert " . mysqli_error($conn);
            }
            $conn->close();
        }
    }   

    
    