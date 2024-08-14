<?php
    require "entrevista.model.php";
    require "entrevista.service.php";
    require "../paciente/paciente.model.php";
    require "../conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles.css">
    <script src="../jquery/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/a8f2f39768.js" crossorigin="anonymous"></script>
    <title>Nova Entrevista</title>
</head>
<body>
    <div class="container">
        <?php
        require_once "../menu.php";
        ?>
        <!--Visualizar Dados-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'visualizar'){
            $entrevista=new Entrevista();
            $conexao=new Conexao();
            $paciente=new Paciente();
            $entrevista_service = new EntrevistaService($conexao,$entrevista,$paciente);
            $retorno=$entrevista_service->recuperar();
        ?>
        <div class="conteudo" style="margin-left: 2%;">
            <div style="display: flex;justify-content: space-between;">
                <div>
                    <h3 class="legenda">Identificação do Usuário</h3>
                </div>
                <div class="text-center">
                    <label>Data da Entrevista: </label>
                    <?php
                        if (isset($retorno->data_entrevista) && $retorno->data_entrevista != null) {
                            $date = new DateTime($retorno->data_entrevista);
                            $data_entrevista = $date->format('d/m/Y');
                        }
                    ?>
                    <input required disabled value="<?= $data_entrevista ?>" type="text" name="data_entrevista">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;"> 
                <div style="width: 20%;">
                    <h6>Prontuário:</h6>
                    <input required disabled value="<?= $retorno->prontuario ?>" type="text" name="prontuario" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Nome:</h6>
                    <input required disabled value="<?= $retorno->nome_paciente ?>" type="text" name="nome_paciente" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Nome Social:</h6>
                    <input required disabled value="<?= $retorno->nome_social ?>" type="text" name="nome_social" style="width: 100%;">
                </div>
                <div style="width: 6%;">
                    <h6>Sexo:</h6>
                    <input required disabled value="<?= $retorno->sexo ?>" type="text" name="sexo" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 30%; margin-right: 5%;">
                    <h6>CPF:</h6>
                    <input required disabled value="<?= $retorno->cpf ?>" type="text" name="cpf" style="width: 100%;">
                </div>
                <div style="width: 30%; margin-right: 5%;">
                    <h6>RG:</h6>
                    <input required disabled value="<?= $retorno->rg ?>" type="text" name="rg" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Cartão do SUS:</h6>
                    <input required disabled value="<?= $retorno->cartao_sus ?>" type="text" name="cartao_sus" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 40%; margin-right: 5%;">
                    <h6>Naturalidade:</h6>
                    <input required disabled value="<?= $retorno->naturalidade ?>" type="text" name="naturalidade" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Data de Nascimento:</h6>
                    <?php
                        if (isset($retorno->data_nascimento) && $retorno->data_nascimento != null){
                            $date = new DateTime($retorno->data_nascimento);
                            $data_nascimento = $date->format('d/m/Y');
                        }
                    ?>
                    <input required disabled value="<?= $data_nascimento ?>" type="text" name="data_nascimento" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 48%; margin-right: 4%;">
                    <h6>Pai:</h6>
                    <input required disabled value="<?= $retorno->pai ?>" type="text" name="pai" style="width: 100%;">
                </div>
                <div style="width: 48%;">
                    <h6>Mãe:</h6>
                    <input required disabled value="<?= $retorno->mae ?>" type="text" name="mae" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Endereço Local</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 35%;">
                    <h6>Logradouro:</h6>
                    <input required disabled value="<?= $retorno->logradouro ?>" type="text" name="logradouro" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Bairro:</h6>
                    <input required disabled value="<?= $retorno->bairro ?>" type="text" name="bairro" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Complemento:</h6>
                    <input required disabled value="<?= $retorno->complemento ?>" type="text" name="complemento" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 25%;">
                    <h6>CEP:</h6>
                    <input required disabled value="<?= $retorno->cep ?>" type="text" name="cep" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Cidade:</h6>
                    <input required disabled value="<?= $retorno->cidade ?>" type="text" name="cidade" style="width: 100%;">
                </div>
                <div style="width: 10%;">
                    <h6>UF:</h6>
                    <input required disabled value="<?= $retorno->uf ?>" type="text" name="uf" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Ponto de Referência:</h6>
                    <input required disabled value="<?= $retorno->ponto_referencia ?>" type="text" name="ponto_referencia" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 40%;">
                    <h6>Telefone:</h6>
                    <input required disabled value="<?= $retorno->telefone ?>" type="text" name="telefone" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Endereço de Origem (Residentes no Interior)</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 35%;">
                    <h6>Logradouro:</h6>
                    <input required disabled value="<?= $retorno->logradouro_origem ?>" type="text" name="logradouro_origem" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Bairro:</h6>
                    <input required disabled value="<?= $retorno->bairro_origem ?>" type="text" name="bairro_origem" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Complemento:</h6>
                    <input required disabled value="<?= $retorno->complemento_origem ?>" type="text" name="complemento_origem" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 25%;">
                    <h6>CEP:</h6>
                    <input required disabled value="<?= $retorno->cep_origem ?>" type="text" name="cep_origem" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Cidade:</h6>
                    <input required disabled value="<?= $retorno->cidade_origem ?>" type="text" name="cidade_origem" style="width: 100%;">
                </div>
                <div style="width: 10%;">
                    <h6>UF:</h6>
                    <input required disabled value="<?= $retorno->uf_origem ?>" type="text" name="uf_origem" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Ponto de Referência:</h6>
                    <input required disabled value="<?= $retorno->ponto_referencia_origem ?>" type="text" name="ponto_referencia_origem" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Responsável</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 40%;">
                    <h6>Nome do Responsável:</h6>
                    <input required disabled value="<?= $retorno->nome_responsavel ?>" type="text" name="nome_responsavel" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Grau de Parentesco:</h6>
                    <input required disabled value="<?= $retorno->grau_parentesco_responsavel ?>" type="text" name="grau_parentesco_responsavel" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Telefone:</h6>
                    <input required disabled value="<?= $retorno->telefone_responsavel ?>" type="text" name="telefone_responsavel" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex">
                <div style="width: 80%;">
                    <h6>Observação:</h6>
                    <input required disabled value="<?= $retorno->observacao_responsavel ?>" type="text" name="observacao_responsavel" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <h6>Cuidador:</h6>
                    <input required disabled value="<?= $retorno->cuidador ?>" type="text" name="cuidador" style="width: 100%;">
                </div>
                <div style="width: 40%;">
                    <h6>Telefone:</h6>
                    <input required disabled value="<?= $retorno->telefone_cuidador ?>" type="text" name="telefone_cuidador" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex">
                <div style="width: 80%;">
                    <h6>Observação:</h6>
                    <input required disabled value="<?= $retorno->observacao_cuidador ?>" type="text" name="observacao_cuidador" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <a class="btn btn-info" href="../dados_socioeconomicos/dados_socioeconomicos.php?acao=visualizar">> Dados Socioeconomicos</a>
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
        <form action="entrevista.controller.php?acao=inserir" method="post" id="entrevista">
            <div style="display: flex;justify-content: space-between;">
                <div>
                    <h3 class="legenda">Identificação do Usuário</h3>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 20%;">
                    <h6>Prontuário:</h6>
                    <input required type="text" name="prontuario" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Nome:</h6>
                    <input required type="text" name="nome_paciente" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Nome Social:</h6>
                    <input required type="text" name="nome_social" style="width: 100%;">
                </div>
                <div style="width: 6%;">
                    <h6>Sexo:</h6>
                    <input required type="text" name="sexo" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 30%; margin-right: 5%;">
                    <h6>CPF:</h6>
                    <input required type="text" name="cpf" style="width: 100%;">
                </div>
                <div style="width: 30%; margin-right: 5%;">
                    <h6>RG:</h6>
                    <input required type="text" name="rg" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Cartão do SUS:</h6>
                    <input required type="text" name="cartao_sus" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 40%; margin-right: 5%;">
                    <h6>Naturalidade:</h6>
                    <input required type="text" name="naturalidade" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Data de Nascimento:</h6>
                    <input required type="date" name="data_nascimento" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 48%; margin-right: 4%;">
                    <h6>Pai:</h6>
                    <input required type="text" name="pai" style="width: 100%;">
                </div>
                <div style="width: 48%;">
                    <h6>Mãe:</h6>
                    <input required type="text" name="mae" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Endereço Local</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 35%;">
                    <h6>Logradouro:</h6>
                    <input required type="text" name="logradouro" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Bairro:</h6>
                    <input required type="text" name="bairro" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Complemento:</h6>
                    <input required type="text" name="complemento" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 25%;">
                    <h6>CEP:</h6>
                    <input required type="text" name="cep" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Cidade:</h6>
                    <input required type="text" name="cidade" style="width: 100%;">
                </div>
                <div style="width: 10%;">
                    <h6>UF:</h6>
                    <input required type="text" name="uf" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Ponto de Referência:</h6>
                    <input required type="text" name="ponto_referencia" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 40%;">
                    <h6>Telefone:</h6>
                    <input required type="text" name="telefone" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Endereço de Origem (Residentes no Interior)</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 35%;">
                    <h6>Logradouro:</h6>
                    <input required type="text" name="logradouro_origem" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Bairro:</h6>
                    <input required type="text" name="bairro_origem" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Complemento:</h6>
                    <input required type="text" name="complemento_origem" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 25%;">
                    <h6>CEP:</h6>
                    <input required type="text" name="cep_origem" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Cidade:</h6>
                    <input required type="text" name="cidade_origem" style="width: 100%;">
                </div>
                <div style="width: 10%;">
                    <h6>UF:</h6>
                    <input required type="text" name="uf_origem" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Ponto de Referência:</h6>
                    <input required type="text" name="ponto_referencia_origem" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Responsável</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 40%;">
                    <h6>Nome do Responsável:</h6>
                    <input required type="text" name="nome_responsavel" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Grau de Parentesco:</h6>
                    <input required type="text" name="grau_parentesco_responsavel" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Telefone:</h6>
                    <input required type="text" name="telefone_responsavel" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex">
                <div style="width: 80%;">
                    <h6>Observação:</h6>
                    <input required type="text" name="observacao_responsavel" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <h6>Cuidador:</h6>
                    <input required type="text" name="cuidador" style="width: 100%;">
                </div>
                <div style="width: 40%;">
                    <h6>Telefone:</h6>
                    <input required type="text" name="telefone_cuidador" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex">
                <div style="width: 80%;">
                    <h6>Observação:</h6>
                    <input required type="text" name="observacao_cuidador" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <input required type="submit" value="> Dados Socioeconômicos" class="btn btn-info">
            </div>
        </form>
        </div>
        <?php
        }
        ?>
        <!--Nova Entrevista-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'nova_entrevista'){
            $entrevista=new Entrevista();
            $conexao=new Conexao();
            $paciente=new Paciente();
            $entrevista_service = new EntrevistaService($conexao,$entrevista,$paciente);
            $retorno=$entrevista_service->recuperar();
        ?>
        <div class="conteudo" style="margin-left: 2%;">
        <form action="entrevista.controller.php?acao=nova_entrevista" method="post" id="entrevista">
            <div style="display: flex;justify-content: space-between;">
                <div>
                    <h3 class="legenda">Identificação do Usuário</h3>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 20%;">
                    <h6>Prontuário:</h6>
                    <input required type="text" name="prontuario" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Nome:</h6>
                    <input disabled value="<?= $retorno->nome_paciente ?>" type="text" name="nome_paciente" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Nome Social:</h6>
                    <input required type="text" name="nome_social" style="width: 100%;">
                </div>
                <div style="width: 6%;">
                    <h6>Sexo:</h6>
                    <input required type="text" name="sexo" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 30%; margin-right: 5%;">
                    <h6>CPF:</h6>
                    <input required type="text" name="cpf" style="width: 100%;">
                </div>
                <div style="width: 30%; margin-right: 5%;">
                    <h6>RG:</h6>
                    <input required type="text" name="rg" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Cartão do SUS:</h6>
                    <input required type="text" name="cartao_sus" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 40%; margin-right: 5%;">
                    <h6>Naturalidade:</h6>
                    <input required type="text" name="naturalidade" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Data de Nascimento:</h6>
                    <input required type="date" name="data_nascimento" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 48%; margin-right: 4%;">
                    <h6>Pai:</h6>
                    <input required type="text" name="pai" style="width: 100%;">
                </div>
                <div style="width: 48%;">
                    <h6>Mãe:</h6>
                    <input required type="text" name="mae" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Endereço Local</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 35%;">
                    <h6>Logradouro:</h6>
                    <input required type="text" name="logradouro" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Bairro:</h6>
                    <input required type="text" name="bairro" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Complemento:</h6>
                    <input required type="text" name="complemento" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 25%;">
                    <h6>CEP:</h6>
                    <input required type="text" name="cep" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Cidade:</h6>
                    <input required type="text" name="cidade" style="width: 100%;">
                </div>
                <div style="width: 10%;">
                    <h6>UF:</h6>
                    <input required type="text" name="uf" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Ponto de Referência:</h6>
                    <input required type="text" name="ponto_referencia" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 40%;">
                    <h6>Telefone:</h6>
                    <input required type="text" name="telefone" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Endereço de Origem (Residentes no Interior)</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 35%;">
                    <h6>Logradouro:</h6>
                    <input required type="text" name="logradouro_origem" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Bairro:</h6>
                    <input required type="text" name="bairro_origem" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Complemento:</h6>
                    <input required type="text" name="complemento_origem" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 25%;">
                    <h6>CEP:</h6>
                    <input required type="text" name="cep_origem" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Cidade:</h6>
                    <input required type="text" name="cidade_origem" style="width: 100%;">
                </div>
                <div style="width: 10%;">
                    <h6>UF:</h6>
                    <input required type="text" name="uf_origem" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Ponto de Referência:</h6>
                    <input required type="text" name="ponto_referencia_origem" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Responsável</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 40%;">
                    <h6>Nome do Responsável:</h6>
                    <input required type="text" name="nome_responsavel" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Grau de Parentesco:</h6>
                    <input required type="text" name="grau_parentesco_responsavel" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Telefone:</h6>
                    <input required type="text" name="telefone_responsavel" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex">
                <div style="width: 80%;">
                    <h6>Observação:</h6>
                    <input required type="text" name="observacao_responsavel" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <h6>Cuidador:</h6>
                    <input required type="text" name="cuidador" style="width: 100%;">
                </div>
                <div style="width: 40%;">
                    <h6>Telefone:</h6>
                    <input required type="text" name="telefone_cuidador" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex">
                <div style="width: 80%;">
                    <h6>Observação:</h6>
                    <input required type="text" name="observacao_cuidador" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <input required type="submit" value="> Dados Socioeconômicos" class="btn btn-info">
            </div>
        </form>
        </div>
        <?php
        }
        ?>
        <!--Atualizar Dados-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'atualizar'){
            $entrevista=new Entrevista();
            $conexao=new Conexao();
            $paciente=new Paciente();
            $entrevista_service = new EntrevistaService($conexao,$entrevista,$paciente);
            $retorno=$entrevista_service->recuperar();
        ?>
        <div class="conteudo" style="margin-left: 2%;">
        <form action="entrevista.controller.php?acao=atualizar" method="post">
            <div style="display: flex;justify-content: space-between;">
                <div>
                    <h3 class="legenda">Identificação do Usuário</h3>
                </div>
                <div class="text-center">
                    <label>Data da Entrevista: </label>
                    <?php
                        $date = new DateTime($retorno->data_entrevista);
                        $data_entrevista = $date->format('Y-m-d');
                    ?>
                    <input required value="<?= $data_entrevista ?>" type="date" name="data_entrevista">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 20%;">
                    <h6>Prontuário:</h6>
                    <input required value="<?= $retorno->prontuario ?>" type="text" name="prontuario" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Nome:</h6>
                    <input required value="<?= $retorno->nome_paciente ?>" type="text" name="nome_paciente" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Nome Social:</h6>
                    <input required value="<?= $retorno->nome_social ?>" type="text" name="nome_social" style="width: 100%;">
                </div>
                <div style="width: 6%;">
                    <h6>Sexo:</h6>
                    <input required value="<?= $retorno->sexo ?>" type="text" name="sexo" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 30%; margin-right: 5%;">
                    <h6>CPF:</h6>
                    <input required value="<?= $retorno->cpf ?>" type="text" name="cpf" style="width: 100%;">
                </div>
                <div style="width: 30%; margin-right: 5%;">
                    <h6>RG:</h6>
                    <input required value="<?= $retorno->rg ?>" type="text" name="rg" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Cartão do SUS:</h6>
                    <input required value="<?= $retorno->cartao_sus ?>" type="text" name="cartao_sus" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 40%; margin-right: 5%;">
                    <h6>Naturalidade:</h6>
                    <input required value="<?= $retorno->naturalidade ?>" type="text" name="naturalidade" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Data de Nascimento:</h6>
                    <?php
                        $date = new DateTime($retorno->data_nascimento);
                        $data_nascimento = $date->format('Y-m-d');
                    ?>
                    <input required value="<?= $data_nascimento ?>" type="date" name="data_nascimento" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 48%; margin-right: 4%;">
                    <h6>Pai:</h6>
                    <input required value="<?= $retorno->pai ?>" type="text" name="pai" style="width: 100%;">
                </div>
                <div style="width: 48%;">
                    <h6>Mãe:</h6>
                    <input required value="<?= $retorno->mae ?>" type="text" name="mae" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Endereço Local</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 35%;">
                    <h6>Logradouro:</h6>
                    <input required value="<?= $retorno->logradouro ?>" type="text" name="logradouro" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Bairro:</h6>
                    <input required value="<?= $retorno->bairro ?>" type="text" name="bairro" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Complemento:</h6>
                    <input required value="<?= $retorno->complemento ?>" type="text" name="complemento" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 25%;">
                    <h6>CEP:</h6>
                    <input required value="<?= $retorno->cep ?>" type="text" name="cep" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Cidade:</h6>
                    <input required value="<?= $retorno->cidade ?>" type="text" name="cidade" style="width: 100%;">
                </div>
                <div style="width: 10%;">
                    <h6>UF:</h6>
                    <input required value="<?= $retorno->uf ?>" type="text" name="uf" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Ponto de Referência:</h6>
                    <input required value="<?= $retorno->ponto_referencia ?>" type="text" name="ponto_referencia" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 40%;">
                    <h6>Telefone:</h6>
                    <input required value="<?= $retorno->telefone ?>" type="text" name="telefone" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Endereço de Origem (Residentes no Interior)</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 35%;">
                    <h6>Logradouro:</h6>
                    <input required value="<?= $retorno->logradouro_origem ?>" type="text" name="logradouro_origem" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Bairro:</h6>
                    <input required value="<?= $retorno->bairro_origem ?>" type="text" name="bairro_origem" style="width: 100%;">
                </div>
                <div style="width: 30%;">
                    <h6>Complemento:</h6>
                    <input required value="<?= $retorno->complemento_origem ?>" type="text" name="complemento_origem" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 25%;">
                    <h6>CEP:</h6>
                    <input required value="<?= $retorno->cep_origem ?>" type="text" name="cep_origem" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Cidade:</h6>
                    <input required value="<?= $retorno->cidade_origem ?>" type="text" name="cidade_origem" style="width: 100%;">
                </div>
                <div style="width: 10%;">
                    <h6>UF:</h6>
                    <input required value="<?= $retorno->uf_origem ?>" type="text" name="uf_origem" style="width: 100%;">
                </div>
                <div style="width: 33%;">
                    <h6>Ponto de Referência:</h6>
                    <input required value="<?= $retorno->ponto_referencia_origem ?>" type="text" name="ponto_referencia_origem" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Responsável</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 40%;">
                    <h6>Nome do Responsável:</h6>
                    <input required value="<?= $retorno->nome_responsavel ?>" type="text" name="nome_responsavel" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Grau de Parentesco:</h6>
                    <input required value="<?= $retorno->grau_parentesco_responsavel ?>" type="text" name="grau_parentesco_responsavel" style="width: 100%;">
                </div>
                <div style="width: 25%;">
                    <h6>Telefone:</h6>
                    <input required value="<?= $retorno->telefone_responsavel ?>" type="text" name="telefone_responsavel" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex">
                <div style="width: 80%;">
                    <h6>Observação:</h6>
                    <input required value="<?= $retorno->observacao_responsavel ?>" type="text" name="observacao_responsavel" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <h6>Cuidador:</h6>
                    <input required value="<?= $retorno->cuidador ?>" type="text" name="cuidador" style="width: 100%;">
                </div>
                <div style="width: 40%;">
                    <h6>Telefone:</h6>
                    <input required value="<?= $retorno->telefone_cuidador ?>" type="text" name="telefone_cuidador" style="width: 100%;">
                </div>
            </div>
            <div style="display: flex">
                <div style="width: 80%;">
                    <h6>Observação:</h6>
                    <input required value="<?= $retorno->observacao_cuidador ?>" type="text" name="observacao_cuidador" style="width: 100%;">
                </div>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <input required type="submit" value="> Dados Socioeconômicos" class="btn btn-info">
            </div>
        </form>
        </div>
        <?php
        }
        ?>
    </div>
</body>
<script src="entrevista.js"></script>
</html>