<?php
session_start();

require "dados_previdenciarios.model.php";
require "dados_previdenciarios.service.php";
require "../conexao.php";

$dados_previdenciarios = new DadosPrevidenciarios();

if(isset($_POST['vinculo_previdenciario']) && $_POST['vinculo_previdenciario'] != null){
    $dados_previdenciarios->__set('vinculo_previdenciario', $_POST['vinculo_previdenciario']);
}
if(isset($_POST['categoria']) && $_POST['categoria'] != null){
    $dados_previdenciarios->__set('categoria', $_POST['categoria']);
}
if(isset($_POST['status']) && $_POST['status'] != null){
    $dados_previdenciarios->__set('status', $_POST['status']);
}

$beneficios = isset($_POST['beneficios']) ? $_POST['beneficios'] : [];
$beneficios_str = implode(",", $beneficios);
$dados_previdenciarios->__set('beneficios', $beneficios_str);

if(isset($_POST['recebe_beneficio_assistencial']) && $_POST['recebe_beneficio_assistencial'] != null){
    $dados_previdenciarios->__set('recebe_beneficio_assistencial', $_POST['recebe_beneficio_assistencial']);
}
if(isset($_POST['tipo_beneficio_assistencial']) && $_POST['tipo_beneficio_assistencial'] != null){
    $dados_previdenciarios->__set('tipo_beneficio_assistencial', $_POST['tipo_beneficio_assistencial']);
}

    
$conexao = new Conexao();
$dados_previdenciarios_service = new DadosPrevidenciariosService($conexao,$dados_previdenciarios);

if(isset($_GET['acao']) && $_GET['acao'] == 'inserir'){
    $dados_previdenciarios_service->inserir();
    header('Location: ../estilo_vida/estilo_vida.php?acao=inserir');
}

if(isset($_GET['acao']) && $_GET['acao'] == 'nova_entrevista'){
    $dados_previdenciarios_service->nova_entrevista();
    header('Location: ../estilo_vida/estilo_vida.php?acao=nova_entrevista');
}

if(isset($_GET['acao']) && $_GET['acao'] == 'atualizar'){
    $dados_previdenciarios_service->atualizar();
    header('Location: ../estilo_vida/estilo_vida.php?acao=atualizar');
}

?>