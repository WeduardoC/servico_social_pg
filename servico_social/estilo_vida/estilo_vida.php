<?php
    require "estilo_vida.model.php";
    require "estilo_vida.service.php";
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
    <title>Estilo de Vida</title>
</head>
<body>
    <div class="container">
        <?php
        require_once "../menu.php";
        ?>
        <!--Visualizar Dados-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'visualizar'){
            $estilo_vida=new EstiloVida();
            $conexao=new Conexao();
            $estilo_vida_service = new EstiloVidaService($conexao,$estilo_vida);
            $retorno=$estilo_vida_service->recuperar();
        ?>
        <div class="conteudo" style="margin-left: 2%;">
            <div style="display: flex;">
                <h3 class="legenda">Elitismo:</h3>
            </div>
            <div style="width: 50%;">
                <select style="width: 100%;" disabled>
                    <option><?= $retorno->elitismo ?></option>
                </select>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Atividade Física:</h3>
            </div>
            <div style="width: 50%;">
                <select style="width: 100%;" disabled>
                    <option><?= $retorno->atividade_fisica ?></option>
                </select>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Tabagismo:</h3>
            </div>
            <div style="width: 50%;">
                <select style="width: 100%;" disabled>
                    <option><?= $retorno->tabagismo ?></option>
                </select>
            </div>
            <!--Vai aparecer se a opção acima for sim-->
            <?php
            if($retorno->tabagismo == 'Sim'){
            ?>
            <div>
                <div style="width: 50%;">
                    <label>Quanto tempo depois de acordar você fuma seu 1º cigarro?</label>
                    <br>
                    <select style="width: 100%;" id="tempo_cigarro" disabled>
                        <option><?= $retorno->tempo_cigarro ?></option>
                    </select>
                </div>
                <div style="width: 50%;">
                    <label>Quantos cigarros por dia você fuma?</label>
                    <br>
                    <select style="width: 100%;" disabled>
                        <option><?= $retorno->cigarros_por_dia ?></option>
                    </select>
                </div>
            </div>
            <?php
            }
            ?>
            <hr>
            <div class="botao">
                <a class="btn btn-primary" href="../index.php">CONCLUIR</a>
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
        <form action="estilo_vida.controller.php?acao=inserir" method="post" id="estilo_vida">
            <div style="display: flex;">
                <h3 class="legenda">Elitismo:</h3>
            </div>
            <div style="width: 50%;">
                <select required name="elitismo" style="width: 100%;color: black;" id="elitismo">
                    <option value="" disabled selected>Selecione</option>
                    <option value="Não etilista">Não etilista</option>
                    <option value="Etilista Social">Etilista Social</option>
                    <option value="Ex alcoolista">Ex alcoolista</option>
                    <option value="Alcoolista">Alcoolista</option>
                    <option value="Não se aplica">Não se aplica</option>
                </select>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Atividade Física:</h3>
            </div>
            <div style="width: 50%;">
                <select required name="atividade_fisica" style="width: 100%;color: black;" id="atividade_fisica">
                    <option value="" disabled selected>Selecione</option>
                    <option value="Nenhum">Nenhum</option>
                    <option value="Esporádico">Esporádico</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Não se aplica">Não se aplica</option>
                </select>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Tabagismo:</h3>
            </div>
            <div style="width: 50%;">
                <select required name="tabagismo" style="width: 100%;color: black;" id="tabagismo">
                    <option value="" disabled selected>Selecione</option>
                    <option value="Não">Não</option>
                    <option value="Sim">Sim</option>
                    <option value="Não se aplica">Não se aplica</option>
                </select>
            </div>
            <!--Vai aparecer se a opção acima for sim-->
            <div class="hidden" id="sim_tabagismo">
                <div style="width: 50%;">
                    <label>Quanto tempo depois de acordar você fuma seu 1º cigarro?</label>
                    <br>
                    <select name="tempo_cigarro" style="width: 100%;" id="tempo_cigarro">
                        <option value="" disabled selected>Selecione</option>
                        <option value="Até 30 minutos">Até 30 minutos</option>
                        <option value="Mais de 30 minutos">Mais de 30 minutos</option>
                    </select>
                </div>
                <div style="width: 50%;">
                    <label>Quantos cigarros por dia você fuma?</label>
                    <br>
                    <select name="cigarros_por_dia" style="width: 100%;" id="cigarros_por_dia">
                        <option value="" disabled selected>Selecione</option>
                        <option value="Até 15">Até 15</option>
                        <option value="De 16 a 25">De 16 a 25</option>
                        <option value="Mais de 25">Mais de 25</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="botao">
                <input type="submit" value="CONCLUIR" class="btn btn-primary">
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
        <form action="estilo_vida.controller.php?acao=nova_entrevista" method="post" id="estilo_vida">
            <div style="display: flex;">
                <h3 class="legenda">Elitismo:</h3>
            </div>
            <div style="width: 50%;">
                <select required name="elitismo" style="width: 100%;color: black;" id="elitismo">
                    <option value="" disabled selected>Selecione</option>
                    <option value="Não etilista">Não etilista</option>
                    <option value="Etilista Social">Etilista Social</option>
                    <option value="Ex alcoolista">Ex alcoolista</option>
                    <option value="Alcoolista">Alcoolista</option>
                    <option value="Não se aplica">Não se aplica</option>
                </select>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Atividade Física:</h3>
            </div>
            <div style="width: 50%;">
                <select required name="atividade_fisica" style="width: 100%;color: black;" id="atividade_fisica">
                    <option value="" disabled selected>Selecione</option>
                    <option value="Nenhum">Nenhum</option>
                    <option value="Esporádico">Esporádico</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Não se aplica">Não se aplica</option>
                </select>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Tabagismo:</h3>
            </div>
            <div style="width: 50%;">
                <select required name="tabagismo" style="width: 100%;color: black;" id="tabagismo">
                    <option value="" disabled selected>Selecione</option>
                    <option value="Não">Não</option>
                    <option value="Sim">Sim</option>
                    <option value="Não se aplica">Não se aplica</option>
                </select>
            </div>
            <!--Vai aparecer se a opção acima for sim-->
            <div class="hidden" id="sim_tabagismo">
                <div style="width: 50%;">
                    <label>Quanto tempo depois de acordar você fuma seu 1º cigarro?</label>
                    <br>
                    <select name="tempo_cigarro" style="width: 100%;" id="tempo_cigarro">
                        <option value="" disabled selected>Selecione</option>
                        <option value="Até 30 minutos">Até 30 minutos</option>
                        <option value="Mais de 30 minutos">Mais de 30 minutos</option>
                    </select>
                </div>
                <div style="width: 50%;">
                    <label>Quantos cigarros por dia você fuma?</label>
                    <br>
                    <select name="cigarros_por_dia" style="width: 100%;" id="cigarros_por_dia">
                        <option value="" disabled selected>Selecione</option>
                        <option value="Até 15">Até 15</option>
                        <option value="De 16 a 25">De 16 a 25</option>
                        <option value="Mais de 25">Mais de 25</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="botao">
                <input type="submit" value="CONCLUIR" class="btn btn-primary">
            </div>
        </form>
        </div>
        <?php
        }
        ?>
        <!--Atualizar Dados-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'atualizar'){
            $estilo_vida=new EstiloVida();
            $conexao=new Conexao();
            $estilo_vida_service = new EstiloVidaService($conexao,$estilo_vida);
            $retorno=$estilo_vida_service->recuperar();
        ?>
        <div class="conteudo" style="margin-left: 2%;">
        <form action="estilo_vida.controller.php?acao=atualizar" method="post" id="estilo_vida">
            <div style="display: flex;">
                <h3 class="legenda">Elitismo:</h3>
            </div>
            <div style="width: 50%;">
                <select name="elitismo" style="width: 100%;color: black;" id="elitismo">
                    <option value="" disabled selected><?= $retorno->elitismo ?></option>
                    <option value="Não etilista">Não etilista</option>
                    <option value="Etilista Social">Etilista Social</option>
                    <option value="Ex alcoolista">Ex alcoolista</option>
                    <option value="Alcoolista">Alcoolista</option>
                    <option value="Não se aplica">Não se aplica</option>
                </select>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Atividade Física:</h3>
            </div>
            <div style="width: 50%;">
                <select name="atividade_fisica" style="width: 100%;color: black;" id="atividade_fisica">
                    <option value="" disabled selected><?= $retorno->atividade_fisica ?></option>
                    <option value="Nenhum">Nenhum</option>
                    <option value="Esporádico">Esporádico</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Não se aplica">Não se aplica</option>
                </select>
            </div>
            <hr>
            <div style="display: flex;">
                <h3 class="legenda">Tabagismo:</h3>
            </div>
            <div style="width: 50%;">
                <select name="tabagismo" style="width: 100%;color: black;" id="tabagismo">
                    <option value="" disabled selected><?= $retorno->tabagismo ?></option>
                    <option value="Não">Não</option>
                    <option value="Sim">Sim</option>
                    <option value="Não se aplica">Não se aplica</option>
                </select>
            </div>
            <!--Vai aparecer se a opção acima for sim-->
            <?php
            if($retorno->tabagismo == 'Sim'){
            ?>
            <div id="sim_tabagismo2">
                <div style="width: 50%;">
                    <label>Quanto tempo depois de acordar você fuma seu 1º cigarro?</label>
                    <br>
                    <select name="tempo_cigarro" style="width: 100%;">
                        <option value="" disabled selected><?= $retorno->tempo_cigarro ?></option>
                        <option value="Até 30 minutos">Até 30 minutos</option>
                        <option value="Mais de 30 minutos">Mais de 30 minutos</option>
                    </select>
                </div>
                <div style="width: 50%;">
                    <label>Quantos cigarros por dia você fuma?</label>
                    <br>
                    <select name="cigarros_por_dia" style="width: 100%;">
                        <option value="" disabled selected><?= $retorno->cigarros_por_dia ?></option>
                        <option value="Até 15">Até 15</option>
                        <option value="De 16 a 25">De 16 a 25</option>
                        <option value="Mais de 25">Mais de 25</option>
                    </select>
                </div>
            </div>
            <?php
            }else{
            ?>
            <div id="sim_tabagismo3" class="hidden">
                <div style="width: 50%;">
                    <label>Quanto tempo depois de acordar você fuma seu 1º cigarro?</label>
                    <br>
                    <select name="tempo_cigarro" style="width: 100%;">
                        <option value="" disabled selected>Selecione</option>
                        <option value="Até 30 minutos">Até 30 minutos</option>
                        <option value="Mais de 30 minutos">Mais de 30 minutos</option>
                    </select>
                </div>
                <div style="width: 50%;">
                    <label>Quantos cigarros por dia você fuma?</label>
                    <br>
                    <select name="cigarros_por_dia" style="width: 100%;">
                        <option value="" disabled selected>Selecione</option>
                        <option value="Até 15">Até 15</option>
                        <option value="De 16 a 25">De 16 a 25</option>
                        <option value="Mais de 25">Mais de 25</option>
                    </select>
                </div>
            </div>
            <?php
            }
            ?>
            <hr>
            <div class="botao">
                <input type="submit" value="CONCLUIR" class="btn btn-primary">
            </div>
        </form>
        </div>
        <?php
        }
        ?>
    </div>
</body>
<script src="estilo_vida.js"></script>
</html>