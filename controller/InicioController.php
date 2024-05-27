<?php
class InicioController{
    private $model;
    private $presenter;

    public function __construct($model, $presenter){
        $this->model = $model;
        $this->presenter = $presenter;
    }

    public function lobby(){
        $id = $_GET["id"];
        $jugador = $this->model->buscarJugador($id);
        $this->presenter->render('view/inicioView.mustache',["jugador" => $jugador]);
    }
}