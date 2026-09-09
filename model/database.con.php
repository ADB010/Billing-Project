<?php
    require_once '../controller/userRegistration.controller.php';
    class DbConnection{
        protected $servername = "localhoast";
        protected $username;
        protected $password;
        protected $dbname;

        function __construct($username, $password, $dbname){
            $this->username = $username; 
            $this->password = $password;
            $this->dbname = $dbname;
        }


        public function dbCreate(){

            $conn = mysqli_connect(
                $this->servername, 
                $this->username, 
                $this->password);

            if(!$conn){
                die("Connection Failed: " . mysqli_connect_error());
            }
            else{
                echo "Connection Succesfull";
            }
            $sql = "CREATE DATABASE $this->dbname";
            if(mysqli_query($conn,$sql))    {
                echo "Database Created";
            }
            else{
                echo "Error Creating Database: " . mysqli_error($conn);
            }
            mysqli_close($conn);
        }

        function dbConnect(){
            
            $conn = mysqli_connect(
                $this->servername, 
                $this->username, 
                $this->password, 
                $this->dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            return $conn;
        }

        function createTable(){
            $conn = $this->dbConnect();

            $sql = "CREATE TABLE users(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            userName VARCHAR(30) NOT NULL,
            pass VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

            if(mysqli_query($conn,$sql)){
                echo "Table Created";
            }
            else{
                echo "Error Creating Table: " . mysqli_error($conn);
            }
            mysqli_close($conn);
        }

        function insertData(){
            $conn = $this->dbConnect();
            // $sql = "INSERT INTO users (userName, pass, email) VALUES 
        }
    }    

    
    