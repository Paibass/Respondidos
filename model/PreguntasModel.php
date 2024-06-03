<?php
class PreguntasModel {

    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getPregunta()
    {
        $preguntas = array();
        //$preguntax = $this->database->query("SELECT id AS pregunta_id, texto AS pregunta_texto FROM preguntas WHERE id = 2");
        //$respuestas = $this->database->query("SELECT id AS respuesta_id, texto AS respuesta_texto, es_correcto FROM respuestas WHERE pregunta_id = 2");
        //$preguntax['respuestas'] = $respuestas;
         //return $preguntax;

        $preguntas_query = $this->database->query("SELECT id AS pregunta_id, texto AS pregunta_texto FROM preguntas ORDER BY RAND() LIMIT 10");
        while($pregunta = $preguntas_query->fetch_assoc()){
            $pregunta_id = $pregunta['pregunta_id'];

            $respuestas_query = $this->database->query("SELECT id AS respuestas_id, texto AS respuesta_texto, es_correcto FROM respuestas WHERE pregunta_id = $pregunta_id); 
            $respuestas = array();

            while($respuesta = $respuestas_query->fetch_assoc()) {
            $respuestas[] = $respuesta;
            }

            $pregunta['respuestas'] = $respuestas;

            $preguntas[] = $pregunta;
        }
        return $preguntas;
    }


}
