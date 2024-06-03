<?php
class PreguntasModel {

    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getPregunta()
    {
        $preguntax = $this->database->query("SELECT id AS pregunta_id, texto AS pregunta_texto FROM preguntas WHERE id = 2");
        $respuestas = $this->database->query("SELECT id AS respuesta_id, texto AS respuesta_texto, es_correcto FROM respuestas WHERE pregunta_id = 2");
        $preguntax['respuestas'] = $respuestas;
         return $preguntax;
    }


}