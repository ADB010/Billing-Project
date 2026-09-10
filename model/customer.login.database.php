<?php 
    require_once '../controller/userLogin.controller.php';
    require_once 'customer.database.con.php';

    class CustomerLoginDatabase extends DbConnection{


        function userCheck($pass, $email){
            try{
                $conn = $this->dbconnect();
                if($pass == 0){
                    $sql = "SELECT 1 FROM customers WHERE email = ? LIMIT 1";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $email);
                    $stmt->execute(); 
                }
                else{
                    $sql = "SELECT 1 FROM customers WHERE email = ? AND pass = ? LIMIT 1";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $email, $pass);
                    $stmt->execute(); 
                }       
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    $message = 1;
                    
                }
                else{
                    $message = 0;
                }        
                $stmt->close(); 
                $conn->close();
                return $message;
            }
            catch(mysqli_sql_exception $e){
                echo $e->getMessage();

            }
        }
        
    }