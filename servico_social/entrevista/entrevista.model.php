<?php

class Entrevista{
    private $id_entrevista;
    private $id_paciente;
    private $data_entrevista;
    private $prontuario;
    private $nome_paciente;
    private $nome_social;
    private $sexo;
    private $cpf;
    private $rg;
    private $cartao_sus;
    private $naturalidade;
    private $data_nascimento;
    private $pai;
    private $mae;
    private $logradouro;
    private $bairro;
    private $complemento;
    private $cep;
    private $cidade;
    private $uf;
    private $ponto_referencia;
    private $telefone;
    private $logradouro_origem;
    private $bairro_origem;
    private $complemento_origem;
    private $cep_origem;
    private $cidade_origem;
    private $uf_origem;
    private $ponto_referencia_origem;
    private $nome_responsavel;
    private $grau_parentesco_responsavel;
    private $telefone_responsavel;
    private $observacao_responsavel;
    private $cuidador;
    private $telefone_cuidador;
    private $observacao_cuidador;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
}

?>