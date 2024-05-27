<?php

class InicioModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function buscarJugador($id)
    {
       return $this->database->query("SELECT * FROM users WHERE id = '$id'");
    }
}

