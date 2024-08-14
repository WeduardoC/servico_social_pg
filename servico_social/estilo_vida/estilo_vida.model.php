<?php

class EstiloVida{
    private $id_estilo_vida;
    public $id_paciente;
    private $elitismo;
    private $atividade_fisica;
    private $tabagismo;
    private $tempo_cigarro;
    private $cigarros_por_dia;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
}

?>