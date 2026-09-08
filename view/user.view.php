<?php include_once 'header.view.php';?>
<body>
        <div class="form">
            <form name="user login" action="../controller/userRegistration.controller.php" method="post">
                <label for="fname">First name:</label><br>
                <input type="text" id="fname" name="fname"><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>
                <input type="submit" class="submit" value="submit">
            </form>
        </div>
</body>
</html>