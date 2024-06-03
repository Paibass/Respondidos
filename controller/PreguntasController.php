<?php
class PreguntasController{
    private $model;
    private $presenter;

    public function __construct($model, $presenter){
        $this->model = $model;
        $this->presenter = $presenter;
    }

    public function jugar(){
        $pregunta = $this->model->getPregunta();
        print_r($pregunta);
        $this->presenter->render('view/juegoView.mustache', $pregunta);
    }
}