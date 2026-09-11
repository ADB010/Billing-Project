<?php include_once 'partials/header.view.php';?>
<body>
    <div class="container">
        <div class="form">
            <h1 class="heading">Signup</h1>
            <form name="user login" action="../controller/userRegistration.controller.php" method="post">
                <label for="fname">Name:</label><br>
                <input type="text" id="fname" name="fname"><br>
                <lable for="email">Email:</lable><br>
                <input type="email" id="email" name="email"><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>
                <input type="submit" class="submit" name="signin" value="Signin"><br>
                <label for="txt">Don't have an account?</label>
                <a href="http://localhost:8080/Billing%20Project/view/login.view.php">Login</a>
            </form>
        </div>
    </div>
</body>
</html>
