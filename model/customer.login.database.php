<?php 
    
    require_once 'customer.database.con.php';

    class CustomerLoginDatabase extends DbConnection{


        function userCheck($pass, $email){
            $conn = $this->dbconnect();
            
            if($pass == 0){
                // To check if a email already exists in the database before signing in
                $sql = "SELECT 1 FROM customers WHERE email = ? LIMIT 1";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute(); 
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                $message = 1;
                }
                else{
                    $message = 0;
                }
            }
            else{
                $sql = "SELECT customer_name, customer_id, pass, email FROM customers WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
                if($user==null){echo "User not Found"; die();}
                $_SESSION['username'] = $user['customer_name'];
                $_SESSION['user_id'] = $user['customer_id'];
                if($this->checkAdmin($pass, $email)){
                    header("Location: ../view/admin.add.view.php");
                    exit;
                }
                if ($user && password_verify($pass, $user['pass']) && $email === $user['email']) {
                    return true;
                } else {
                    return false;
                }
            }       
            $stmt->close(); 
            $conn->close();
            return $message;
        }

        function checkAdmin($pass, $email){
            $conn = $this->dbconnect();
            $sql = "SELECT pass, email FROM customers WHERE customer_name = 'admin'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    if(password_verify($pass, $row['pass']) & $email == $row['email']){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            }
        }
    }