<?php include_once 'partials/header.view.php';?>
<body>
    <div class="container">
        <div class="form">
            <h1 class="heading">login</h1>
            <form name="User Login" action="../controller/userLogin.controller.php" method="post">
                <label for="fname">Name:</label><br>
                <input type="text" id="fname" name="fname"><br>
                <lable for="email">Email:</lable><br>
                <input type="email" id="email" name="email"><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>
                <input type="submit" class="submit" name="login" value="Login"><br>
                <label for="txt">Already have an account?</label>
                <a href="http://localhost:8080/Billing%20Project/view/signin.view.php">Signin</a>
            </form>
        </div>
    </div>
</body>
</html>