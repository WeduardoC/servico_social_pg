<?php
session_start();

require "dados_socioeconomicos.model.php";
require "dados_socioeconomicos.service.php";
require "../conexao.php";

$dados_socioeconomicos = new DadosSocioeconomicos();
if (isset($_POST['estado_civil']) && $_POST['estado_civil'] != null) {
    $dados_socioeconomicos->__set('estado_civil', $_POST['estado_civil']);
}

if (isset($_POST['grupo_etnico']) && $_POST['grupo_etnico'] != null) {
    $dados_socioeconomicos->__set('grupo_etnico', $_POST['grupo_etnico']);
}

if (isset($_POST['religiosidade']) && $_POST['religiosidade'] != null) {
    $dados_socioeconomicos->__set('religiosidade', $_POST['religiosidade']);
}

if (isset($_POST['escolaridade']) && $_POST['escolaridade'] != null) {
    $dados_socioeconomicos->__set('escolaridade', $_POST['escolaridade']);
}

if (isset($_POST['profissao']) && $_POST['profissao'] != null) {
    $dados_socioeconomicos->__set('profissao', $_POST['profissao']);
}

if (isset($_POST['ocupacao']) && $_POST['ocupacao'] != null) {
    $dados_socioeconomicos->__set('ocupacao', $_POST['ocupacao']);
}

if (isset($_POST['habitacao']) && $_POST['habitacao'] != null) {
    $dados_socioeconomicos->__set('habitacao', $_POST['habitacao']);
}

if (isset($_POST['habitacao_outro']) && $_POST['habitacao_outro'] != null) {
    $dados_socioeconomicos->__set('habitacao_outro', $_POST['habitacao_outro']);
}

if (isset($_POST['condicao_ocupacao']) && $_POST['condicao_ocupacao'] != null) {
    $dados_socioeconomicos->__set('condicao_ocupacao', $_POST['condicao_ocupacao']);
}

if (isset($_POST['condicao_ocupacao_outro']) && $_POST['condicao_ocupacao_outro'] != null) {
    $dados_socioeconomicos->__set('condicao_ocupacao_outro', $_POST['condicao_ocupacao_outro']);
}

if (isset($_POST['numero_comodos']) && $_POST['numero_comodos'] != null) {
    $dados_socioeconomicos->__set('numero_comodos', $_POST['numero_comodos']);
}

if (isset($_POST['paredes']) && $_POST['paredes'] != null) {
    $dados_socioeconomicos->__set('paredes', $_POST['paredes']);
}

if (isset($_POST['paredes_outro']) && $_POST['paredes_outro'] != null) {
    $dados_socioeconomicos->__set('paredes_outro', $_POST['paredes_outro']);
}

if (isset($_POST['cobertura']) && $_POST['cobertura'] != null) {
    $dados_socioeconomicos->__set('cobertura', $_POST['cobertura']);
}

if (isset($_POST['cobertura_outro']) && $_POST['cobertura_outro'] != null) {
    $dados_socioeconomicos->__set('cobertura_outro', $_POST['cobertura_outro']);
}

if (isset($_POST['piso']) && $_POST['piso'] != null) {
    $dados_socioeconomicos->__set('piso', $_POST['piso']);
}

if (isset($_POST['eletricidade']) && $_POST['eletricidade'] != null) {
    $dados_socioeconomicos->__set('eletricidade', $_POST['eletricidade']);
}

if (isset($_POST['abastecimento_agua']) && $_POST['abastecimento_agua'] != null) {
    $dados_socioeconomicos->__set('abastecimento_agua', $_POST['abastecimento_agua']);
}

if (isset($_POST['abastecimento_agua_outro']) && $_POST['abastecimento_agua_outro'] != null) {
    $dados_socioeconomicos->__set('abastecimento_agua_outro', $_POST['abastecimento_agua_outro']);
}

if (isset($_POST['condicao_agua']) && $_POST['condicao_agua'] != null) {
    $dados_socioeconomicos->__set('condicao_agua', $_POST['condicao_agua']);
}

if (isset($_POST['destino_lixo']) && $_POST['destino_lixo'] != null) {
    $dados_socioeconomicos->__set('destino_lixo', $_POST['destino_lixo']);
}

if (isset($_POST['destino_dejetos']) && $_POST['destino_dejetos'] != null) {
    $dados_socioeconomicos->__set('destino_dejetos', $_POST['destino_dejetos']);
}

$conexao = new Conexao();
$dados_socioeconomicos_service = new DadosSocioeconomicosService($conexao,$dados_socioeconomicos);

if(isset($_GET['acao']) && $_GET['acao'] == 'inserir'){
    $dados_socioeconomicos_service->inserir();
    header('Location: ../integrantes/integrantes.php?acao=inserir');
}

if(isset($_GET['acao']) && $_GET['acao'] == 'nova_entrevista'){
    $dados_socioeconomicos_service->nova_entrevista();
    header('Location: ../integrantes/integrantes.php?acao=nova_entrevista');
}

if(isset($_GET['acao']) && $_GET['acao'] == 'atualizar'){
    $dados_socioeconomicos_service->atualizar();
    header('Location: ../integrantes/integrantes.php?acao=atualizar');
}

?>