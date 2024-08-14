<?php

class DadosSocioeconomicos {
    private $id_dados_socioeconomicos;
    private $id_paciente;
    private $estado_civil;
    private $grupo_etnico;
    private $religiosidade;
    private $escolaridade;
    private $profissao;
    private $ocupacao;
    private $habitacao;
    private $habitacao_outro;
    private $condicao_ocupacao;
    private $condicao_ocupacao_outro;
    private $numero_comodos;
    private $paredes;
    private $paredes_outro;
    private $cobertura;
    private $cobertura_outro;
    private $piso;
    private $eletricidade;
    private $abastecimento_agua;
    private $abastecimento_agua_outro;
    private $condicao_agua;
    private $destino_lixo;
    private $destino_dejetos;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}

?>
