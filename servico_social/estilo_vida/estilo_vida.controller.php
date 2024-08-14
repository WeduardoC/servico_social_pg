<?php
session_start();

require "estilo_vida.model.php";
require "estilo_vida.service.php";
require "../conexao.php";

$estilo_vida = new EstiloVida();
if(isset($_POST['elitismo']) && $_POST['elitismo'] != null){
    $estilo_vida->__set('elitismo',$_POST['elitismo']);
}
if(isset($_POST['atividade_fisica']) && $_POST['atividade_fisica'] != null){
    $estilo_vida->__set('atividade_fisica',$_POST['atividade_fisica']);
}
if(isset($_POST['tabagismo']) && $_POST['tabagismo'] != null){
    $estilo_vida->__set('tabagismo',$_POST['tabagismo']);
}
if(isset($_POST['tempo_cigarro']) && $_POST['tempo_cigarro'] != null){
    $estilo_vida->__set('tempo_cigarro',$_POST['tempo_cigarro']);
}
if(isset($_POST['cigarros_por_dia']) && $_POST['cigarros_por_dia'] != null){
    $estilo_vida->__set('cigarros_por_dia',$_POST['cigarros_por_dia']);
}
    
$conexao = new Conexao();
$estilo_vida_service = new EstiloVidaService($conexao,$estilo_vida);

if(isset($_GET['acao']) && $_GET['acao'] == 'inserir'){
    $estilo_vida_service->inserir();
    header('Location: ../index.php?inclusao=1');
}

if (isset($_GET['acao']) && $_GET['acao'] == 'nova_entrevista') {
    $estilo_vida_service->nova_entrevista();
    header('Location: ../index.php?inclusao=1');
}

if(isset($_GET['acao']) && $_GET['acao'] == 'atualizar'){
    $estilo_vida_service->atualizar();
    header('Location: ../index.php?atualizacao=1');
}

?>