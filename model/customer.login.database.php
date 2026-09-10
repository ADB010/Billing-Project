<?php 
    
    require_once 'customer.database.con.php';

    class CustomerLoginDatabase extends DbConnection{


        function userCheck($pass, $email){
            // try{
                $conn = $this->dbconnect();
                
                if($pass == 0){
                    // To check if a email already exists in the database before signing in
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
                if($this->checkAdmin($pass, $email)){
                    header("Location: ../view/admin.view.php");
                }
                if($result->num_rows > 0){
                    $message = 1;
                    
                }
                else{
                    $message = 0;
                }        
                $stmt->close(); 
                $conn->close();
                return $message;
            // }
            // catch(mysqli_sql_exception $e){
            //     echo $e->getMessage();

            // }
        }

        function checkAdmin($pass, $email){
            // try{
                $conn = $this->dbconnect();
                $sql = "SELECT pass, email FROM customers WHERE customer_name = 'admin'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        if($pass == $row['pass'] || $email == $row['email']){
                            return true;
                        }
                        else{
                            return false;
                        }
                    }
                }
                // $stmt = $conn->prepare($sql);
                // $stmt->bind_param("s", $email);
                // $stmt->execute(); 
            // }    
            // catch(mysqli_sql_exception $e){
            //     echo $e->getMessage();

            // }
        }
    }