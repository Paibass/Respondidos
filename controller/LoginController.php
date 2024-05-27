<?php

class LoginController
{
    private $model;
    private $presenter;

    public function __construct($model, $presenter){
        $this->model = $model;
        $this->presenter = $presenter;
    }

    public function get(){
        $this->presenter->render("view/loginView.mustache");
    }

    public function verificarLogin(){
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $user = $this->model->getUser($email);
        $user = array_merge(...$user);
        if ($user == null){
            header("Location:/Respondidos/");
            exit();
        }
        elseif ($user["password"] == $pass){
            $id = $user["id"];
            header("Location:/Respondidos/Inicio/lobby?id=$id");
            exit();
        }
        else{
            header("Location:/Respondidos/");
            exit();
        }

    }

}