<?php

class userReg {
    public $user;
    public $pass;

    public function __construct() {
        $this->user = $_POST["fname"];
        $this->pass = $_POST["password"];
    }
}