<?php

class Integrantes{
    private $id_integrante;
    public $id_paciente;
    private $nome_integrante;
    private $qtde;
    private $renda_rs;
    private $renda_sm;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
}

?>