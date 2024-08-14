<?php
    require "integrantes.model.php";
    require "integrantes.service.php";
    require "../conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="integrantes.css">
    <script src="../jquery/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/a8f2f39768.js" crossorigin="anonymous"></script>
    <title>Integrantes</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <div class="container">
        <?php
        require_once "../menu.php";
        ?>
        <!--Visualizar Dados-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'visualizar'){
            $integrantes=new Integrantes();
            $conexao=new Conexao();
            $integrantes_service = new IntegrantesService($conexao,$integrantes);
            $integrantes_lista = $integrantes_service->recuperar();
        ?>
        <div class="conteudo" style="margin-left: 2%;">
            <div style="display: flex;">
                <h3 class="legenda">Composição Familiar:</h3>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome do Integrante</th>
                        <th>Quantidade</th>
                        <th>Renda (R$)</th>
                        <th>Renda (SM)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($integrantes_lista as $integrante): ?>
                    <tr>
                        <td><?= $integrante->nome_integrante ?></td>
                        <td><?= $integrante->qtde ?></td>
                        <td><?= $integrante->renda_rs ?></td>
                        <td><?= $integrante->renda_sm ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="botao" style="display: flex;justify-content: end;">
                <a class="btn btn-info" href="../dados_previdenciarios/dados_previdenciarios.php?acao=visualizar">> Dados Previdenciários</a>
            </div>
        </div>
        <?php
        }
        ?>
        <!--Inserir Dados-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'inserir'){
        ?>
        <div class="conteudo" style="margin-left: 2%;">
        <div style="display: flex;">
            <h3 class="legenda">Composição Familiar:</h3>
        </div>
        <form id="form" method="post" action="integrantes.controller.php?acao=inserir">
            <div class="dropdown-container">
                <button type="button" id="dropdown-button" class="btn btn-primary px-3 py-2"><strong>Selecionar Integrantes</strong></button>
                <div id="dropdown" class="dropdown">
                    <label><input type="checkbox" name="integrantes[]" value="Paciente" onchange="toggleFields(this)"> Paciente</label>
                    <label><input type="checkbox" name="integrantes[]" value="Pai" onchange="toggleFields(this)"> Pai</label>
                    <label><input type="checkbox" name="integrantes[]" value="Padrasto" onchange="toggleFields(this)"> Padrasto</label>
                    <label><input type="checkbox" name="integrantes[]" value="Mãe" onchange="toggleFields(this)"> Mãe</label>
                    <label><input type="checkbox" name="integrantes[]" value="Madrasta" onchange="toggleFields(this)"> Madrasta</label>
                    <label><input type="checkbox" name="integrantes[]" value="Cônjuge" onchange="toggleFields(this)"> Cônjuge</label>
                    <label><input type="checkbox" name="integrantes[]" value="Companheiro(a)" onchange="toggleFields(this)"> Companheiro(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Irmão(ã)" onchange="toggleFields(this)"> Irmão(ã)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Filho(a)" onchange="toggleFields(this)"> Filho(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Enteado(a)" onchange="toggleFields(this)"> Enteado(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Neto(a)" onchange="toggleFields(this)"> Neto(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Avô" onchange="toggleFields(this)"> Avô</label>
                    <label><input type="checkbox" name="integrantes[]" value="Avó" onchange="toggleFields(this)"> Avó</label>
                    <label><input type="checkbox" name="integrantes[]" value="Tio(a)" onchange="toggleFields(this)"> Tio(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Genro" onchange="toggleFields(this)"> Genro</label>
                    <label><input type="checkbox" name="integrantes[]" value="Nora" onchange="toggleFields(this)"> Nora</label>
                    <label><input type="checkbox" name="integrantes[]" value="Sogro(a)" onchange="toggleFields(this)"> Sogro(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Cunhado(a)" onchange="toggleFields(this)"> Cunhado(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Outros" onchange="toggleFields(this)"> Outros</label>
                </div>
            </div>
            <!-- Campos adicionais para cada integrante selecionado -->
            <div id="inputs-container"></div>
            <div class="botao" style="display: flex;justify-content: end;">
                <input type="submit" value="> Dados Previdenciários" class="btn btn-info">
            </div>
        </form>
        </div>
        <?php
        }
        ?>
        <!--Nova Entrevista-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'nova_entrevista'){
        ?>
        <div class="conteudo" style="margin-left: 2%;">
        <div style="display: flex;">
            <h3 class="legenda">Composição Familiar:</h3>
        </div>
        <form id="form" method="post" action="integrantes.controller.php?acao=nova_entrevista">
            <div class="dropdown-container">
                <button type="button" id="dropdown-button" class="btn btn-primary px-3 py-2"><strong>Selecionar Integrantes</strong></button>
                <div id="dropdown" class="dropdown">
                    <label><input type="checkbox" name="integrantes[]" value="Paciente" onchange="toggleFields(this)"> Paciente</label>
                    <label><input type="checkbox" name="integrantes[]" value="Pai" onchange="toggleFields(this)"> Pai</label>
                    <label><input type="checkbox" name="integrantes[]" value="Padrasto" onchange="toggleFields(this)"> Padrasto</label>
                    <label><input type="checkbox" name="integrantes[]" value="Mãe" onchange="toggleFields(this)"> Mãe</label>
                    <label><input type="checkbox" name="integrantes[]" value="Madrasta" onchange="toggleFields(this)"> Madrasta</label>
                    <label><input type="checkbox" name="integrantes[]" value="Cônjuge" onchange="toggleFields(this)"> Cônjuge</label>
                    <label><input type="checkbox" name="integrantes[]" value="Companheiro(a)" onchange="toggleFields(this)"> Companheiro(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Irmão(ã)" onchange="toggleFields(this)"> Irmão(ã)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Filho(a)" onchange="toggleFields(this)"> Filho(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Enteado(a)" onchange="toggleFields(this)"> Enteado(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Neto(a)" onchange="toggleFields(this)"> Neto(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Avô" onchange="toggleFields(this)"> Avô</label>
                    <label><input type="checkbox" name="integrantes[]" value="Avó" onchange="toggleFields(this)"> Avó</label>
                    <label><input type="checkbox" name="integrantes[]" value="Tio(a)" onchange="toggleFields(this)"> Tio(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Genro" onchange="toggleFields(this)"> Genro</label>
                    <label><input type="checkbox" name="integrantes[]" value="Nora" onchange="toggleFields(this)"> Nora</label>
                    <label><input type="checkbox" name="integrantes[]" value="Sogro(a)" onchange="toggleFields(this)"> Sogro(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Cunhado(a)" onchange="toggleFields(this)"> Cunhado(a)</label>
                    <label><input type="checkbox" name="integrantes[]" value="Outros" onchange="toggleFields(this)"> Outros</label>
                </div>
            </div>
            <!-- Campos adicionais para cada integrante selecionado -->
            <div id="inputs-container"></div>
            <div class="botao" style="display: flex;justify-content: end;">
                <input type="submit" value="> Dados Previdenciários" class="btn btn-info">
            </div>
        </form>
        </div>
        <?php
        }
        ?>
        <!-- Atualizar Dados -->
        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == 'atualizar') {
            $integrantes = new Integrantes();
            $conexao = new Conexao();
            $integrantes_service = new IntegrantesService($conexao, $integrantes);
            $retorno = $integrantes_service->recuperar();
        ?>
            <div class="conteudo" style="margin-left: 2%;">
                <form action="integrantes.controller.php?acao=atualizar" method="post" id="integrantes">
                    <?php foreach ($retorno as $integrante): ?>
                        <div class="integrante-inputs">
                            <input type="hidden" name="nome_integrante_antigo[]" value="<?= $integrante->nome_integrante ?>">
                            <h3><?= $integrante->nome_integrante ?></h3>
                            <label>Qtde: <input type="number" name="qtde_<?= $integrante->nome_integrante ?>" value="<?= $integrante->qtde ?>" required></label><br>
                            <label>Renda (R$): <input type="text" name="renda_rs_<?= $integrante->nome_integrante ?>" value="<?= $integrante->renda_rs ?>" required></label><br>
                            <label>Renda (SM): <input type="text" name="renda_sm_<?= $integrante->nome_integrante ?>" value="<?= $integrante->renda_sm ?>" required></label><br>
                        </div>
                    <?php endforeach; ?>
                    <hr>
                    <div class="botao" style="display: flex;justify-content: end;">
                        <input type="submit" value="> Previdência e Assistência" class="btn btn-info">
                    </div>
                </form>
            </div>
        <?php
        }
        ?>
    </div>
</body>
<script src="integrantes.js"></script>
</html>