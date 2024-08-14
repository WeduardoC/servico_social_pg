<?php
session_start();

require "entrevista.model.php";
require "entrevista.service.php";
require "../paciente/paciente.model.php";
require "../conexao.php";

$entrevista = new Entrevista();
$paciente = new Paciente();

if(isset($_POST['data_entrevista']) && $_POST['data_entrevista'] != null){
    $entrevista->__set('data_entrevista', $_POST['data_entrevista']);
}else{
    $dia = date("d");
    $mes = date("m");
    $ano = date("Y");
    $data = date("Y-m-d");
    $entrevista->__set('data_entrevista', $data);
}

if(isset($_POST['prontuario']) && $_POST['prontuario'] != null){
    $entrevista->__set('prontuario', $_POST['prontuario']);
}

if(isset($_POST['nome_paciente']) && $_POST['nome_paciente'] != null){
    $entrevista->__set('nome_paciente', $_POST['nome_paciente']);
    $paciente->__set('nome_paciente', $_POST['nome_paciente']);
}

if(isset($_POST['nome_social']) && $_POST['nome_social'] != null){
    $entrevista->__set('nome_social', $_POST['nome_social']);
}

if(isset($_POST['sexo']) && $_POST['sexo'] != null){
    $entrevista->__set('sexo', $_POST['sexo']);
}

if(isset($_POST['cpf']) && $_POST['cpf'] != null){
    $entrevista->__set('cpf', $_POST['cpf']);
}

if(isset($_POST['rg']) && $_POST['rg'] != null){
    $entrevista->__set('rg', $_POST['rg']);
}

if(isset($_POST['cartao_sus']) && $_POST['cartao_sus'] != null){
    $entrevista->__set('cartao_sus', $_POST['cartao_sus']);
}

if(isset($_POST['naturalidade']) && $_POST['naturalidade'] != null){
    $entrevista->__set('naturalidade', $_POST['naturalidade']);
}

if(isset($_POST['data_nascimento']) && $_POST['data_nascimento'] != null){
    $entrevista->__set('data_nascimento', $_POST['data_nascimento']);
}

if(isset($_POST['pai']) && $_POST['pai'] != null){
    $entrevista->__set('pai', $_POST['pai']);
}

if(isset($_POST['mae']) && $_POST['mae'] != null){
    $entrevista->__set('mae', $_POST['mae']);
}

if(isset($_POST['logradouro']) && $_POST['logradouro'] != null){
    $entrevista->__set('logradouro', $_POST['logradouro']);
}

if(isset($_POST['bairro']) && $_POST['bairro'] != null){
    $entrevista->__set('bairro', $_POST['bairro']);
}

if(isset($_POST['complemento']) && $_POST['complemento'] != null){
    $entrevista->__set('complemento', $_POST['complemento']);
}

if(isset($_POST['cep']) && $_POST['cep'] != null){
    $entrevista->__set('cep', $_POST['cep']);
}

if(isset($_POST['cidade']) && $_POST['cidade'] != null){
    $entrevista->__set('cidade', $_POST['cidade']);
}

if(isset($_POST['uf']) && $_POST['uf'] != null){
    $entrevista->__set('uf', $_POST['uf']);
}

if(isset($_POST['ponto_referencia']) && $_POST['ponto_referencia'] != null){
    $entrevista->__set('ponto_referencia', $_POST['ponto_referencia']);
}

if(isset($_POST['telefone']) && $_POST['telefone'] != null){
    $entrevista->__set('telefone', $_POST['telefone']);
}

if(isset($_POST['logradouro_origem']) && $_POST['logradouro_origem'] != null){
    $entrevista->__set('logradouro_origem', $_POST['logradouro_origem']);
}

if(isset($_POST['bairro_origem']) && $_POST['bairro_origem'] != null){
    $entrevista->__set('bairro_origem', $_POST['bairro_origem']);
}

if(isset($_POST['complemento_origem']) && $_POST['complemento_origem'] != null){
    $entrevista->__set('complemento_origem', $_POST['complemento_origem']);
}

if(isset($_POST['cep_origem']) && $_POST['cep_origem'] != null){
    $entrevista->__set('cep_origem', $_POST['cep_origem']);
}

if(isset($_POST['cidade_origem']) && $_POST['cidade_origem'] != null){
    $entrevista->__set('cidade_origem', $_POST['cidade_origem']);
}

if(isset($_POST['uf_origem']) && $_POST['uf_origem'] != null){
    $entrevista->__set('uf_origem', $_POST['uf_origem']);
}

if(isset($_POST['ponto_referencia_origem']) && $_POST['ponto_referencia_origem'] != null){
    $entrevista->__set('ponto_referencia_origem', $_POST['ponto_referencia_origem']);
}

if(isset($_POST['nome_responsavel']) && $_POST['nome_responsavel'] != null){
    $entrevista->__set('nome_responsavel', $_POST['nome_responsavel']);
}

if(isset($_POST['grau_parentesco_responsavel']) && $_POST['grau_parentesco_responsavel'] != null){
    $entrevista->__set('grau_parentesco_responsavel', $_POST['grau_parentesco_responsavel']);
}

if(isset($_POST['telefone_responsavel']) && $_POST['telefone_responsavel'] != null){
    $entrevista->__set('telefone_responsavel', $_POST['telefone_responsavel']);
}

if(isset($_POST['observacao_responsavel']) && $_POST['observacao_responsavel'] != null){
    $entrevista->__set('observacao_responsavel', $_POST['observacao_responsavel']);
}

if(isset($_POST['cuidador']) && $_POST['cuidador'] != null){
    $entrevista->__set('cuidador', $_POST['cuidador']);
}

if(isset($_POST['telefone_cuidador']) && $_POST['telefone_cuidador'] != null){
    $entrevista->__set('telefone_cuidador', $_POST['telefone_cuidador']);
}

if(isset($_POST['observacao_cuidador']) && $_POST['observacao_cuidador'] != null){
    $entrevista->__set('observacao_cuidador', $_POST['observacao_cuidador']);
}

    
$conexao = new Conexao();
$entrevista_service = new EntrevistaService($conexao,$entrevista,$paciente);

if(isset($_GET['acao']) && $_GET['acao'] == 'inserir'){
    $entrevista_service->inserir();
    header('Location: ../dados_socioeconomicos/dados_socioeconomicos.php?acao=inserir');
}

if(isset($_GET['acao']) && $_GET['acao'] == 'nova_entrevista'){
    $entrevista_service->nova_entrevista();
    header('Location: ../dados_socioeconomicos/dados_socioeconomicos.php?acao=nova_entrevista');
}

if(isset($_GET['acao']) && $_GET['acao'] == 'atualizar'){
    $entrevista_service->atualizar();
    header('Location: ../dados_socioeconomicos/dados_socioeconomicos.php?acao=atualizar');
}

?>