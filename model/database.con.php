<?php
    require_once '../controller/userRegistration.controller.php';
    
    function dbCreate($name, $pass, $database){
        $servername = "localhoast";
        $username = $name;
        $password = $pass;
        $dbname = $database;

        $conn = mysqli_connect($servername, $username, $password);

        if(!$conn){
            die("Connection Failed: " . mysqli_connect_error());
        }
        else{
            echo "Connection Succesfull";
        }
        $sql = "CREATE DATABASE $dbname";
        if(mysqli_query($conn,$sql))    {
            echo "Database Created";
        }
        else{
            echo "Error Creating Database: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    function dbConnect($name, $pass, $database){
        
        $conn = mysqli_connect("localhost", $name, $pass, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function createTable($name, $pass, $database){
        dbConnect($name, $pass, $database);

    }
    
    