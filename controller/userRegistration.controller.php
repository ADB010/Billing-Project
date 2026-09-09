<?php

    $username = $_POST['fname'];
    $pass = $_POST['password'];

    dbCreate($username, $pass, "user");