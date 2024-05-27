<?php

class LoginModel
{
    private  $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getUser($email){
        return $this->database->query("SELECT * FROM users WHERE email = '$email'");
    }
}