<?php
session_start();

require "integrantes.model.php";
require "integrantes.service.php";
require "../conexao.php";

$integrantes = new Integrantes();

$integrantes_data = [];

if (isset($_POST['integrantes'])) {
    foreach ($_POST['integrantes'] as $nome_integrante) {
        $qtde_key = 'qtde_' . $nome_integrante;
        $renda_rs_key = 'renda_rs_' . $nome_integrante;
        $renda_sm_key = 'renda_sm_' . $nome_integrante;

        if (isset($_POST[$qtde_key]) && isset($_POST[$renda_rs_key]) && isset($_POST[$renda_sm_key])) {
            $integrantes_data[] = [
                'nome_integrante' => $nome_integrante,
                'qtde' => $_POST[$qtde_key],
                'renda_rs' => $_POST[$renda_rs_key],
                'renda_sm' => $_POST[$renda_sm_key]
            ];
        }
    }
}

$conexao = new Conexao();
$integrantes_service = new IntegrantesService($conexao, $integrantes);

if (isset($_GET['acao']) && $_GET['acao'] == 'inserir') {
    foreach ($integrantes_data as $data) {
        $integrantes->__set('nome_integrante', $data['nome_integrante']);
        $integrantes->__set('qtde', $data['qtde']);
        $integrantes->__set('renda_rs', $data['renda_rs']);
        $integrantes->__set('renda_sm', $data['renda_sm']);
        $integrantes_service->inserir();
    }
    header('Location: ../dados_previdenciarios/dados_previdenciarios.php?acao=inserir');
}

if (isset($_GET['acao']) && $_GET['acao'] == 'nova_entrevista') {
    $integrantes_service->integrantes_data = $integrantes_data;
    $integrantes_service->nova_entrevista();
    header('Location: ../dados_previdenciarios/dados_previdenciarios.php?acao=nova_entrevista');
}

if (isset($_POST['nome_integrante_antigo'])) {
    foreach ($_POST['nome_integrante_antigo'] as $nome_integrante_antigo) {
        $qtde_key = 'qtde_' . $nome_integrante_antigo;
        $renda_rs_key = 'renda_rs_' . $nome_integrante_antigo;
        $renda_sm_key = 'renda_sm_' . $nome_integrante_antigo;

        if (isset($_POST[$qtde_key]) && isset($_POST[$renda_rs_key]) && isset($_POST[$renda_sm_key])) {
            $integrantes_data[] = [
                'nome_integrante_antigo' => $nome_integrante_antigo,
                'qtde' => $_POST[$qtde_key],
                'renda_rs' => $_POST[$renda_rs_key],
                'renda_sm' => $_POST[$renda_sm_key]
            ];
        }
    }
}

if (isset($_GET['acao']) && $_GET['acao'] == 'atualizar') {
    $integrantes->__set('id_paciente', $_SESSION['id_paciente']);
    foreach ($integrantes_data as $data) {
        $integrantes->__set('nome_integrante', $data['nome_integrante_antigo']);
        $integrantes->__set('qtde', $data['qtde']);
        $integrantes->__set('renda_rs', $data['renda_rs']);
        $integrantes->__set('renda_sm', $data['renda_sm']);
        $integrantes->__set('nome_integrante_antigo', $data['nome_integrante_antigo']);

        $integrantes_service->atualizar();
    }
    header('Location: ../dados_previdenciarios/dados_previdenciarios.php?acao=atualizar');
}


?>
