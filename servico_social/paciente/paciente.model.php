<?php

class Paciente{
    private $id_paciente;
    private $nome_paciente;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
}

?>