<?php

class DadosPrevidenciarios{
    private $id_beneficio;
    public $id_paciente;
    private $vinculo_previdenciario;
    private $categoria;
    private $status;
    private $beneficios;
    private $recebe_beneficio_assistencial;
    private $tipo_beneficio_assistencial;


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
}

?>