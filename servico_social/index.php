<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="autocomplete_nome_pront.css">
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/a8f2f39768.js" crossorigin="anonymous"></script>
    <title>Página Inicial</title>
</head>
<body>
<?php 
if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1){ 
?>
<div class="bg-success pt-2 text-white d-flex justify-content-center">
    <h5>Entrevista Cadastrada Com Sucesso!</h5>
</div>
<?php 
} 
?>
<?php 
if(isset($_GET['atualizacao']) && $_GET['atualizacao'] == 1){ 
?>
<div class="bg-success pt-2 text-white d-flex justify-content-center">
    <h5>Entrevista Atualizada Com Sucesso!</h5>
</div>
<?php 
} 
?>
<div class="container">
    <?php
    require_once "menu.php";
    ?>
    <div class="conteudo" style="margin-left: 2%;">
        <div  style="display:flex;justify-content:space-between;">
            <div>
                <h3 class="legenda">> Página Inicial</h3>
            </div>
            <div>
                <a href="entrevista/entrevista.php?acao=inserir">
                    Cadastrar Novo Paciente <i class="fa-regular fa-file"></i>
                </a>
            </div>
        </div>
        <br>
        <label>Opção de Pesquisa:</label>
        <form action="">
            <div id="pesquisa">
                <br>
                <select onchange="opcaoPesquisa()" id="opcao_pesquisa">
                    <option value="" disabled selected>Selecione</option>
                    <option value="prontuario">Prontuário</option>
                    <option value="nome">Nome</option>
                </select>
                <input type="text" id="input_index">
            </div>
            <div>
                <div id="suggestions"></div>
            </div>
            <div class="botao">
                <button type="button" class="btn btn-primary" onclick="buscar(); buscarId()">BUSCAR</button>
            </div>
        </form>
        <div id="tabela">
            <table class="table">
                <thead class="text-center">
                  <tr>
                    <th>Prontuário</th>
                    <th>Nome/Nome Social</th>
                    <th>Data de Nascimento</th>
                    <th colspan="3">AÇÕES</th>
                  </tr>
                </thead>
                <tbody class="text-center" id="tabela_body">
                  <tr id="linha_tabela">
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script src="index.js"></script>
</html>