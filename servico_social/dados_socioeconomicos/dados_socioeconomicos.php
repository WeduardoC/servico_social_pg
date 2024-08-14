<?php
    require "../paciente/paciente.model.php";
    require "dados_socioeconomicos.model.php";
    require "dados_socioeconomicos.service.php";
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
    <title>Dados Socioeconomicos</title>
</head>
<body>
    <div class="container">
        <?php
        require_once "../menu.php";
        ?>
        <!--Visualizar Dados-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'visualizar'){
            $dados_socioeconomicos=new DadosSocioeconomicos();
            $conexao=new Conexao();
            $dados_socioeconomicos_service = new DadosSocioeconomicosService($conexao,$dados_socioeconomicos);
            $retorno=$dados_socioeconomicos_service->recuperar();
        ?>
        <div class="conteudo" style="margin-left: 2%;">
            <div style="display: flex;">
                <h3 class="legenda">Dados Gerais:</h3>
            </div>
            <div style="display: flex;justify-content: space-around;">
                <div style="width: 45%;">
                    <label>Estado Civil:</label>
                    <br>
                    <div>
                        <select required name="estado_civil" style="width: 100%;" disabled>
                            <option><?= $retorno->estado_civil ?></option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;">
                    <label>Grupo Étnico:</label>
                    <br>
                    <div>
                        <select required name="grupo_etnico" style="width: 100%;" disabled>
                            <option><?= $retorno->grupo_etnico ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content: space-around;">
                <div style="width: 35%;">
                    <label>Religiosidade:</label>
                    <br>
                    <div>
                        <select required name="religiosidade" style="width: 100%;" disabled>
                            <option><?= $retorno->religiosidade ?></option>
                        </select>
                    </div>
                </div>
                <div style="width: 60%;">
                    <label>Escolaridade:</label>
                    <br>
                    <div>
                        <select required name="escolaridade" style="width: 100%;" disabled>
                            <option><?= $retorno->escolaridade ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 100%;">
                    <label>Profissão:</label>
                    <br>
                    <div style="width:100%;">
                        <input disabled type="text" name="profissao" style="width:100%;">
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 100%;">
                    <label>Ocupação:</label>
                    <br>
                    <div style="width:100%;">
                        <input disabled type="text" name="ocupacao" style="width:100%;">
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <h3 class="legenda">Situação Habitacional/Saneamento Básico:</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Tipo de Habitação:</label>
                    <br>
                    <div>
                        <select required name="habitacao" style="width: 100%;" disabled>
                            <option><?= $retorno->habitacao ?></option>
                        </select>
                    </div>
                </div>
                <?php
                if($retorno->habitacao == 'Outro'){
                ?>
                <div style="width: 45%;">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input disabled value="<?= $retorno->habitacao_outro ?>" type="text" style="width: 100%;" name="habitacao_outro">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Condição de Ocupação:</label>
                    <br>
                    <div>
                        <select required name="condicao_ocupacao" style="width: 100%;" disabled>
                            <option><?= $retorno->condicao_ocupacao ?></option>
                        </select>
                    </div>
                </div>
                <?php
                if($retorno->condicao_ocupacao == 'Outro'){
                ?>
                <div style="width: 45%;">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input disabled value="<?= $retorno->condicao_ocupacao_outro ?>" type="text" style="width: 100%;" name="condicao_ocupacao_outro">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div style="width: 50%;">
                <label>Número de Cômodos:</label>
                <br>
                <div>
                    <select required name="numero_comodos"  style="width: 100%;" disabled>
                        <option><?= $retorno->numero_comodos ?></option>
                    </select>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Paredes:</label>
                    <br>
                    <div>
                        <select required name="paredes" style="width: 100%;" disabled>
                            <option><?= $retorno->paredes ?></option>
                        </select>
                    </div>
                </div>
                <?php
                if($retorno->paredes == 'Outro'){
                ?>
                <div style="width: 45%;">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input disabled value="<?= $retorno->paredes_outro ?>" type="text" style="width: 100%;" name="paredes_outro">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Cobertura:</label>
                    <br>
                    <div>
                        <select required name="cobertura" style="width: 100%;" disabled>
                            <option><?= $retorno->cobertura ?></option>
                        </select>   
                    </div>
                </div>
                <?php
                if($retorno->cobertura == 'Outro'){
                ?>
                <div style="width: 45%;">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input disabled value="<?= $retorno->cobertura_outro ?>" type="text" style="width: 100%;" name="cobertura_outro">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div style="display: flex;justify-content: center;">
                <label style="margin-right: 10px;">Piso:</label>
                <label style="margin-right: 20px;"><input disabled type="radio" name="piso" value="Com Revestimento" <?php if ($retorno->piso == "Com Revestimento") echo 'checked'; ?>> Com Revestimento</label>
                <label><input disabled type="radio" name="piso" value="Sem Revestimento" <?php if ($retorno->piso == "Sem Revestimento") echo 'checked'; ?>> Sem Revestimento</label>
            </div>
            <div style="width: 50%;">
                <label>Eletricidade:</label>
                <br>
                <select required name="eletricidade" style="width: 100%;" disabled>
                    <option><?= $retorno->eletricidade ?></option>
                </select>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Abastecimento de Água:</label>
                    <br>
                    <div>
                        <select required name="abastecimento_agua" style="width: 100%;" disabled>
                            <option><?= $retorno->abastecimento_agua ?></option>
                        </select>
                    </div>
                </div>
                <?php
                if($retorno->abastecimento_agua == 'Outro'){
                ?>
                <div style="width: 45%;">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input disabled value="<?= $retorno->abastecimento_agua_outro ?>" type="text" style="width: 100%;" name="abastecimento_agua_outro">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div style="width: 50%;">
                <label>Condições de Uso de Água:</label>
                <br>
                <select required name="condicao_agua" style="width: 100%;" disabled>
                    <option><?= $retorno->condicao_agua ?></option>
                </select>
            </div>
            <div style="width: 50%;">
                <label>Destino de Lixo:</label>
                <br>
                <select required name="destino_lixo" style="width: 100%;" disabled>
                    <option><?= $retorno->destino_lixo ?></option>
                </select>
            </div>
            <div style="width: 50%;">
                <label>Destino de Dejetos:</label>
                <br>
                <select required name="destino_dejetos" style="width: 100%;" disabled>
                    <option><?= $retorno->destino_dejetos ?></option>
                </select>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <a class="btn btn-info" href="../integrantes/integrantes.php?acao=visualizar">> Composição Familiar</a>
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
            <form action="dados_socioeconomicos.controller.php?acao=inserir" method="post" id="dados_socioeconomicos">
            <div style="display: flex;">
                <h3 class="legenda">Dados Gerais:</h3>
            </div>
            <div style="display: flex;justify-content: space-around;">
                <div style="width: 45%;">
                    <label>Estado Civil:</label>
                    <br>
                    <div>
                        <select required name="estado_civil" style="width: 100%;color:black;">
                            <option value="">Selecione</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Solteiro(a)">Solteiro(a)</option>
                            <option value="Viúvo(a)">Viúvo(a)</option>
                            <option value="Divorciado(a)">Divorciado(a)</option>
                            <option value="União Estável">União Estável</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;">
                    <label>Grupo Étnico:</label>
                    <br>
                    <div>
                        <select required name="grupo_etnico" style="width: 100%;color:black;">
                            <option value="">Selecione</option>
                            <option value="Amarelo(a)">Amarelo(a)</option>
                            <option value="Branco(a)">Branco(a)</option>
                            <option value="Preto(a)">Preto(a)</option>
                            <option value="Indígena(a)">Indígena(a)</option>
                            <option value="Sem declaração">Sem declaração</option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content: space-around;">
                <div style="width: 35%;">
                    <label>Religiosidade:</label>
                    <br>
                    <div>
                        <select required name="religiosidade" style="width: 100%;color:black;">
                            <option value="">Selecione</option>
                            <option value="Católica">Católica</option>
                            <option value="Espírita">Espírita</option>
                            <option value="Evangélica">Evangélica</option>
                            <option value="Umbandista">Umbandista</option>
                            <option value="Testemunha de Jeová">Testemunha de Jeová</option>
                            <option value="Outra">Outra</option>
                        </select>
                    </div>
                </div>
                <div style="width: 60%;">
                    <label>Escolaridade:</label>
                    <br>
                    <div>
                        <select required name="escolaridade" style="width: 100%;color:black;">
                            <option value="">Selecione</option>
                            <option value="Não se aplica">Não se aplica</option>
                            <option value="Alfabetizado">Alfabetizado</option>
                            <option value="Não alfabetizado">Não alfabetizado</option>
                            <option value="Ensino Fundamental incompleto (1º a 4º ano)">Ensino Fundamental incompleto (1º a 4º ano)</option>
                            <option value="Ensino Fundamental incompleto (5º a 9º ano)">Ensino Fundamental incompleto (5º a 9º ano)</option>
                            <option value="Fundamental completo">Fundamental completo</option>
                            <option value="Ensino Médio completo">Ensino Médio completo</option>
                            <option value="Ensino Médio incompleto">Ensino Médio incompleto</option>
                            <option value="Pós-Graduação (Especialização)">Pós-Graduação (Especialização)</option>
                            <option value="Pós-Graduação (Mestrado)">Pós-Graduação (Mestrado)</option>
                            <option value="Pós-Graduação (Doutorado)">Pós-Graduação (Doutorado)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 100%;">
                    <label>Profissão:</label>
                    <br>
                    <div style="width:100%;">
                        <input disabled type="text" name="profissao" style="width:100%;">
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 100%;">
                    <label>Ocupação:</label>
                    <br>
                    <div style="width:100%;">
                        <input disabled type="text" name="ocupacao" style="width:100%;">
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <h3 class="legenda">Situação Habitacional/Saneamento Básico:</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Tipo de Habitação:</label>
                    <br>
                    <div>
                        <select required name="habitacao" style="width: 100%;color:black;" id="habitacao">
                            <option value="">Selecione</option>
                            <option value="Casa">Casa</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Quarto">Quarto</option>
                            <option value="Palafita">Palafita</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;" class="hidden" id="habitacao_outro">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input type="text" style="width: 100%;" name="habitacao_outro">
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Condição de Ocupação:</label>
                    <br>
                    <div>
                        <select required name="condicao_ocupacao" style="width: 100%;color:black;" id="condicao_ocupacao">
                            <option value="">Selecione</option>
                            <option value="Próprio">Próprio</option>
                            <option value="Próprio em Aquisição">Próprio em Aquisição</option>
                            <option value="Alugado">Alugado</option>
                            <option value="Cedido">Cedido</option>
                            <option value="Patrões">Patrões</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;" class="hidden" id="condicao_ocupacao_outro">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input type="text" style="width: 100%;" name="condicao_ocupacao_outro">
                    </div>
                </div>
            </div>
            <div style="width: 50%;">
                <label>Número de Cômodos:</label>
                <br>
                <div>
                    <select required name="numero_comodos"  style="width: 100%;color:black;">
                        <option value="">Selecione</option>
                        <option value="De 1 a 3">De 1 a 3</option>
                        <option value="De 4 a 6">De 4 a 6</option>
                        <option value="De 7 a 9">De 7 a 9</option>
                        <option value="Mais que 9">Mais que 9</option>
                    </select>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Paredes:</label>
                    <br>
                    <div>
                        <select required name="paredes" style="width: 100%;color:black;" id="paredes">
                            <option value="">Selecione</option>
                            <option value="Tijolo">Tijolo</option>
                            <option value="Tábua">Tábua</option>
                            <option value="Taipa">Taipa</option>
                            <option value="Adobe">Adobe</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;" class="hidden" id="paredes_outro">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input type="text" style="width: 100%;" name="paredes_outro">
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Cobertura:</label>
                    <br>
                    <div>
                        <select required name="cobertura" style="width: 100%;color:black;" id="cobertura">
                            <option value="">Selecione</option>
                            <option value="Telha">Telha</option>
                            <option value="Telha com forro">Telha com forro</option>
                            <option value="Laje">Laje</option>
                            <option value="Palha">Palha</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;" class="hidden" id="cobertura_outro">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input type="text" style="width: 100%;" name="cobertura_outro">
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content: center;">
                <label style="margin-right: 10px;">Piso:</label>
                <label style="margin-right: 20px;"><input required type="radio" name="piso" value="Com Revestimento"> Com Revestimento</label>
                <label><input required type="radio" name="piso" value="Sem Revestimento"> Sem Revestimento</label>
            </div>
            <div style="width: 50%;">
                <label>Eletricidade:</label>
                <br>
                <select required name="eletricidade" style="width: 100%;color:black;" id="eletricidade">
                    <option value="">Selecione</option>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Abastecimento de Água:</label>
                    <br>
                    <div>
                        <select required name="abastecimento_agua" style="width: 100%;color:black;" id="abastecimento_agua">
                            <option value="">Selecione</option>
                            <option value="Poço">Poço</option>
                            <option value="Rio">Rio</option>
                            <option value="Rede Geral">Rede Geral</option>
                            <option value="Chafariz">Chafariz</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;" class="hidden" id="abastecimento_agua_outro">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input type="text" style="width: 100%;" name="abastecimento_agua_outro">
                    </div>
                </div>
            </div>
            <div style="width: 50%;">
                <label>Condições de Uso de Água:</label>
                <br>
                <select required name="condicao_agua" style="width: 100%;color:black;" id="condicao_agua">
                    <option value="">Selecione</option>
                    <option value="Filtrada">Filtrada</option>
                    <option value="Fervida">Fervida</option>
                    <option value="Mineral">Mineral</option>
                    <option value="Sem cuidado prévio">Sem cuidado prévio</option>
                </select>
            </div>
            <div style="width: 50%;">
                <label>Destino de Lixo:</label>
                <br>
                <select required name="destino_lixo" style="width: 100%;color:black;" id="destino_lixo">
                    <option value="">Selecione</option>
                    <option value="Coleta pública">Coleta pública</option>
                    <option value="Queimado">Queimado</option>
                    <option value="Enterrado">Enterrado</option>
                    <option value="Céu aberto">Céu aberto</option>
                </select>
            </div>
            <div style="width: 50%;">
                <label>Destino de Dejetos:</label>
                <br>
                <select required name="destino_dejetos" style="width: 100%;color:black;" id="destino_dejetos">
                    <option value="">Selecione</option>
                    <option value="Esgoto">Esgoto</option>
                    <option value="Fossa negra/seca">Fossa negra/seca</option>
                    <option value="Fossa séptica">Fossa séptica</option>
                    <option value="Céu aberto">Céu aberto</option>
                </select>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <input type="submit" value="> Composição Familiar" class="btn btn-info">
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
            <form action="dados_socioeconomicos.controller.php?acao=nova_entrevista" method="post" id="dados_socioeconomicos">
            <div style="display: flex;">
                <h3 class="legenda">Dados Gerais:</h3>
            </div>
            <div style="display: flex;justify-content: space-around;">
                <div style="width: 45%;">
                    <label>Estado Civil:</label>
                    <br>
                    <div>
                        <select required name="estado_civil" style="width: 100%;color:black;">
                            <option value="">Selecione</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Solteiro(a)">Solteiro(a)</option>
                            <option value="Viúvo(a)">Viúvo(a)</option>
                            <option value="Divorciado(a)">Divorciado(a)</option>
                            <option value="União Estável">União Estável</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;">
                    <label>Grupo Étnico:</label>
                    <br>
                    <div>
                        <select required name="grupo_etnico" style="width: 100%;color:black;">
                            <option value="">Selecione</option>
                            <option value="Amarelo(a)">Amarelo(a)</option>
                            <option value="Branco(a)">Branco(a)</option>
                            <option value="Preto(a)">Preto(a)</option>
                            <option value="Indígena(a)">Indígena(a)</option>
                            <option value="Sem declaração">Sem declaração</option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content: space-around;">
                <div style="width: 35%;">
                    <label>Religiosidade:</label>
                    <br>
                    <div>
                        <select required name="religiosidade" style="width: 100%;color:black;">
                            <option value="">Selecione</option>
                            <option value="Católica">Católica</option>
                            <option value="Espírita">Espírita</option>
                            <option value="Evangélica">Evangélica</option>
                            <option value="Umbandista">Umbandista</option>
                            <option value="Testemunha de Jeová">Testemunha de Jeová</option>
                            <option value="Outra">Outra</option>
                        </select>
                    </div>
                </div>
                <div style="width: 60%;">
                    <label>Escolaridade:</label>
                    <br>
                    <div>
                        <select required name="escolaridade" style="width: 100%;color:black;">
                            <option value="">Selecione</option>
                            <option value="Não se aplica">Não se aplica</option>
                            <option value="Alfabetizado">Alfabetizado</option>
                            <option value="Não alfabetizado">Não alfabetizado</option>
                            <option value="Ensino Fundamental incompleto (1º a 4º ano)">Ensino Fundamental incompleto (1º a 4º ano)</option>
                            <option value="Ensino Fundamental incompleto (5º a 9º ano)">Ensino Fundamental incompleto (5º a 9º ano)</option>
                            <option value="Fundamental completo">Fundamental completo</option>
                            <option value="Ensino Médio completo">Ensino Médio completo</option>
                            <option value="Ensino Médio incompleto">Ensino Médio incompleto</option>
                            <option value="Pós-Graduação (Especialização)">Pós-Graduação (Especialização)</option>
                            <option value="Pós-Graduação (Mestrado)">Pós-Graduação (Mestrado)</option>
                            <option value="Pós-Graduação (Doutorado)">Pós-Graduação (Doutorado)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 100%;">
                    <label>Profissão:</label>
                    <br>
                    <div style="width:100%;">
                        <input disabled type="text" name="profissao" style="width:100%;">
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 100%;">
                    <label>Ocupação:</label>
                    <br>
                    <div style="width:100%;">
                        <input disabled type="text" name="ocupacao" style="width:100%;">
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <h3 class="legenda">Situação Habitacional/Saneamento Básico:</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Tipo de Habitação:</label>
                    <br>
                    <div>
                        <select required name="habitacao" style="width: 100%;color:black;" id="habitacao">
                            <option value="">Selecione</option>
                            <option value="Casa">Casa</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Quarto">Quarto</option>
                            <option value="Palafita">Palafita</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;" class="hidden" id="habitacao_outro">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input type="text" style="width: 100%;" name="habitacao_outro">
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Condição de Ocupação:</label>
                    <br>
                    <div>
                        <select required name="condicao_ocupacao" style="width: 100%;color:black;" id="condicao_ocupacao">
                            <option value="">Selecione</option>
                            <option value="Próprio">Próprio</option>
                            <option value="Próprio em Aquisição">Próprio em Aquisição</option>
                            <option value="Alugado">Alugado</option>
                            <option value="Cedido">Cedido</option>
                            <option value="Patrões">Patrões</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;" class="hidden" id="condicao_ocupacao_outro">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input type="text" style="width: 100%;" name="condicao_ocupacao_outro">
                    </div>
                </div>
            </div>
            <div style="width: 50%;">
                <label>Número de Cômodos:</label>
                <br>
                <div>
                    <select required name="numero_comodos" style="width: 100%;color:black;">
                        <option value="">Selecione</option>
                        <option value="De 1 a 3">De 1 a 3</option>
                        <option value="De 4 a 6">De 4 a 6</option>
                        <option value="De 7 a 9">De 7 a 9</option>
                        <option value="Mais que 9">Mais que 9</option>
                    </select>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Paredes:</label>
                    <br>
                    <div>
                        <select required name="paredes" style="width: 100%;color:black;" id="paredes">
                            <option value="">Selecione</option>
                            <option value="Tijolo">Tijolo</option>
                            <option value="Tábua">Tábua</option>
                            <option value="Taipa">Taipa</option>
                            <option value="Adobe">Adobe</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;" class="hidden" id="paredes_outro">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input type="text" style="width: 100%;" name="paredes_outro">
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Cobertura:</label>
                    <br>
                    <div>
                        <select required name="cobertura" style="width: 100%;color:black;" id="cobertura">
                            <option value="">Selecione</option>
                            <option value="Telha">Telha</option>
                            <option value="Telha com forro">Telha com forro</option>
                            <option value="Laje">Laje</option>
                            <option value="Palha">Palha</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;" class="hidden" id="cobertura_outro">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input type="text" style="width: 100%;" name="cobertura_outro">
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content: center;">
                <label style="margin-right: 10px;">Piso:</label>
                <label style="margin-right: 20px;"><input required type="radio" name="piso" value="Com Revestimento"> Com Revestimento</label>
                <label><input required type="radio" name="piso" value="Sem Revestimento"> Sem Revestimento</label>
            </div>
            <div style="width: 50%;">
                <label>Eletricidade:</label>
                <br>
                <select required name="eletricidade" style="width: 100%;color:black;" id="eletricidade">
                    <option value="">Selecione</option>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Abastecimento de Água:</label>
                    <br>
                    <div>
                        <select required name="abastecimento_agua" style="width: 100%;color:black;" id="abastecimento_agua">
                            <option value="">Selecione</option>
                            <option value="Poço">Poço</option>
                            <option value="Rio">Rio</option>
                            <option value="Rede Geral">Rede Geral</option>
                            <option value="Chafariz">Chafariz</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;" class="hidden" id="abastecimento_agua_outro">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input type="text" style="width: 100%;" name="abastecimento_agua_outro">
                    </div>
                </div>
            </div>
            <div style="width: 50%;">
                <label>Condições de Uso de Água:</label>
                <br>
                <select required name="condicao_agua" style="width: 100%;color:black;" id="condicao_agua">
                    <option value="">Selecione</option>
                    <option value="Filtrada">Filtrada</option>
                    <option value="Fervida">Fervida</option>
                    <option value="Mineral">Mineral</option>
                    <option value="Sem cuidado prévio">Sem cuidado prévio</option>
                </select>
            </div>
            <div style="width: 50%;">
                <label>Destino de Lixo:</label>
                <br>
                <select required name="destino_lixo" style="width: 100%;color:black;" id="destino_lixo">
                    <option value="">Selecione</option>
                    <option value="Coleta pública">Coleta pública</option>
                    <option value="Queimado">Queimado</option>
                    <option value="Enterrado">Enterrado</option>
                    <option value="Céu aberto">Céu aberto</option>
                </select>
            </div>
            <div style="width: 50%;">
                <label>Destino de Dejetos:</label>
                <br>
                <select required name="destino_dejetos" style="width: 100%;color:black;" id="destino_dejetos">
                    <option value="">Selecione</option>
                    <option value="Esgoto">Esgoto</option>
                    <option value="Fossa negra/seca">Fossa negra/seca</option>
                    <option value="Fossa séptica">Fossa séptica</option>
                    <option value="Céu aberto">Céu aberto</option>
                </select>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <input type="submit" value="> Composição Familiar" class="btn btn-info">
            </div>
            </form>
        </div>
        <?php
        }
        ?>
        <!--Atualizar Dados-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'atualizar'){
            $dados_socioeconomicos=new DadosSocioeconomicos();
            $conexao=new Conexao();
            $dados_socioeconomicos_service = new DadosSocioeconomicosService($conexao,$dados_socioeconomicos);
            $retorno=$dados_socioeconomicos_service->recuperar();
        ?>
        <div class="conteudo" style="margin-left: 2%;">
            <form action="dados_socioeconomicos.controller.php?acao=atualizar" method="post">
            <div style="display: flex;">
                <h3 class="legenda">Dados Gerais:</h3>
            </div>
            <div style="display: flex;justify-content: space-around;">
                <div style="width: 45%;">
                    <label>Estado Civil:</label>
                    <br>
                    <div>
                        <select name="estado_civil" style="width: 100%;color:black;">
                            <option value="" disabled selected><?= $retorno->estado_civil ?></option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Solteiro(a)">Solteiro(a)</option>
                            <option value="Viúvo(a)">Viúvo(a)</option>
                            <option value="Divorciado(a)">Divorciado(a)</option>
                            <option value="União Estável">União Estável</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;">
                    <label>Grupo Étnico:</label>
                    <br>
                    <div>
                        <select name="grupo_etnico" style="width: 100%;color:black;">
                            <option value="" disabled selected><?= $retorno->grupo_etnico ?></option>
                            <option value="Amarelo(a)">Amarelo(a)</option>
                            <option value="Branco(a)">Branco(a)</option>
                            <option value="Preto(a)">Preto(a)</option>
                            <option value="Indígena(a)">Indígena(a)</option>
                            <option value="Sem declaração">Sem declaração</option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content: space-around;">
                <div style="width: 35%;">
                    <label>Religiosidade:</label>
                    <br>
                    <div>
                        <select name="religiosidade" style="width: 100%;color:black;">
                            <option value="" disabled selected><?= $retorno->religiosidade ?></option>
                            <option value="Católica">Católica</option>
                            <option value="Espírita">Espírita</option>
                            <option value="Evangélica">Evangélica</option>
                            <option value="Umbandista">Umbandista</option>
                            <option value="Testemunha de Jeová">Testemunha de Jeová</option>
                            <option value="Outra">Outra</option>
                        </select>
                    </div>
                </div>
                <div style="width: 60%;">
                    <label>Escolaridade:</label>
                    <br>
                    <div>
                        <select name="escolaridade" style="width: 100%;color:black;">
                            <option value="" disabled selected><?= $retorno->escolaridade ?></option>
                            <option value="Não se aplica">Não se aplica</option>
                            <option value="Alfabetizado">Alfabetizado</option>
                            <option value="Não alfabetizado">Não alfabetizado</option>
                            <option value="Ensino Fundamental incompleto (1º a 4º ano)">Ensino Fundamental incompleto (1º a 4º ano)</option>
                            <option value="Ensino Fundamental incompleto (5º a 9º ano)">Ensino Fundamental incompleto (5º a 9º ano)</option>
                            <option value="Fundamental completo">Fundamental completo</option>
                            <option value="Ensino Médio completo">Ensino Médio completo</option>
                            <option value="Ensino Médio incompleto">Ensino Médio incompleto</option>
                            <option value="Pós-Graduação (Especialização)">Pós-Graduação (Especialização)</option>
                            <option value="Pós-Graduação (Mestrado)">Pós-Graduação (Mestrado)</option>
                            <option value="Pós-Graduação (Doutorado)">Pós-Graduação (Doutorado)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 100%;">
                    <label>Profissão:</label>
                    <br>
                    <div style="width:100%;">
                        <input disabled type="text" name="profissao" style="width:100%;">
                    </div>
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 100%;">
                    <label>Ocupação:</label>
                    <br>
                    <div style="width:100%;">
                        <input disabled type="text" name="profissao" style="width:100%;">
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <h3 class="legenda">Situação Habitacional/Saneamento Básico:</h3>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Tipo de Habitação:</label>
                    <br>
                    <div>
                        <select name="habitacao" style="width: 100%;color:black;" id="habitacao">
                            <option value="" disabled selected><?= $retorno->habitacao ?></option>
                            <option value="Casa">Casa</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Quarto">Quarto</option>
                            <option value="Palafita">Palafita</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <?php
                if($retorno->habitacao == 'Outro'){
                ?>
                <div style="width: 45%;" id="habitacao_outro2">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input value="<?= $retorno->habitacao_outro ?>" type="text" style="width: 100%;" name="habitacao_outro">
                    </div>
                </div>
                <?php
                }else{
                ?>
                <div style="width: 45%;" id="habitacao_outro3" class="hidden">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input value="<?= $retorno->habitacao_outro ?>" type="text" style="width: 100%;" name="habitacao_outro">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Condição de Ocupação:</label>
                    <br>
                    <div>
                        <select name="condicao_ocupacao" style="width: 100%;color:black;" id="condicao_ocupacao">
                            <option value="" disabled selected><?= $retorno->condicao_ocupacao ?></option>
                            <option value="Próprio">Próprio</option>
                            <option value="Próprio em Aquisição">Próprio em Aquisição</option>
                            <option value="Alugado">Alugado</option>
                            <option value="Cedido">Cedido</option>
                            <option value="Patrões">Patrões</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <?php
                if($retorno->condicao_ocupacao == 'Outro'){
                ?>
                <div style="width: 45%;" id="condicao_ocupacao_outro2">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input value="<?= $retorno->condicao_ocupacao_outro ?>" type="text" style="width: 100%;" name="condicao_ocupacao_outro">
                    </div>
                </div>
                <?php
                }else{
                ?>
                <div style="width: 45%;" id="condicao_ocupacao_outro3" class="hidden">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input value="<?= $retorno->condicao_ocupacao_outro ?>" type="text" style="width: 100%;" name="condicao_ocupacao_outro">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div style="width: 50%;">
                <label>Número de Cômodos:</label>
                <br>
                <div>
                    <select name="numero_comodos" style="width: 100%;color:black;">
                        <option value="" disabled selected><?= $retorno->numero_comodos ?></option>
                        <option value="De 1 a 3">De 1 a 3</option>
                        <option value="De 4 a 6">De 4 a 6</option>
                        <option value="De 7 a 9">De 7 a 9</option>
                        <option value="Mais que 9">Mais que 9</option>
                    </select>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Paredes:</label>
                    <br>
                    <div>
                        <select name="paredes" style="width: 100%;color:black;" id="paredes">
                            <option value="" disabled selected><?= $retorno->paredes ?></option>
                            <option value="Tijolo">Tijolo</option>
                            <option value="Tábua">Tábua</option>
                            <option value="Taipa">Taipa</option>
                            <option value="Adobe">Adobe</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <?php
                if($retorno->paredes == 'Outro'){
                ?>
                <div style="width: 45%;" id="paredes_outro2">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input value="<?= $retorno->paredes_outro ?>" type="text" style="width: 100%;" name="paredes_outro">
                    </div>
                </div>
                <?php
                }else{
                ?>
                <div style="width: 45%;" class="hidden" id="paredes_outro3">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input value="<?= $retorno->paredes_outro ?>" type="text" style="width: 100%;" name="paredes_outro">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Cobertura:</label>
                    <br>
                    <div>
                        <select name="cobertura" style="width: 100%;color:black;" id="cobertura">
                            <option value="" disabled selected><?= $retorno->cobertura ?></option>
                            <option value="Telha">Telha</option>
                            <option value="Telha com forro">Telha com forro</option>
                            <option value="Laje">Laje</option>
                            <option value="Palha">Palha</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <?php
                if($retorno->cobertura == 'Outro'){
                ?>
                <div style="width: 45%;" id="cobertura_outro2">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input value="<?= $retorno->cobertura_outro ?>" type="text" style="width: 100%;" name="cobertura_outro">
                    </div>
                </div>
                <?php
                }else{
                ?>
                <div style="width: 45%;" class="hidden" id="cobertura_outro3">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input value="<?= $retorno->cobertura_outro ?>" type="text" style="width: 100%;" name="cobertura_outro">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div style="display: flex;justify-content: center;">
                <label style="margin-right: 10px;">Piso:</label>
                <label style="margin-right: 20px;"><input type="radio" name="piso" value="Com Revestimento" <?php if ($retorno->piso == "Com Revestimento") echo 'checked'; ?>> Com Revestimento</label>
                <label><input type="radio" name="piso" value="Sem Revestimento" <?php if ($retorno->piso == "Sem Revestimento") echo 'checked'; ?>> Sem Revestimento</label>
            </div>
            <div style="width: 50%;">
                <label>Eletricidade:</label>
                <br>
                <select name="eletricidade" style="width: 100%;color:black;" id="eletricidade">
                    <option value="" disabled selected><?= $retorno->eletricidade ?></option>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 50%;">
                    <label>Abastecimento de Água:</label>
                    <br>
                    <div>
                        <select name="abastecimento_agua" style="width: 100%;color:black;" id="abastecimento_agua">
                            <option value="" disabled selected><?= $retorno->abastecimento_agua ?></option>
                            <option value="Poço">Poço</option>
                            <option value="Rio">Rio</option>
                            <option value="Rede Geral">Rede Geral</option>
                            <option value="Chafariz">Chafariz</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <?php
                if($retorno->abastecimento_agua == 'Outro'){
                ?>
                <div style="width: 45%;" id="abastecimento_agua_outro2">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input value="<?= $retorno->abastecimento_agua_outro ?>" type="text" style="width: 100%;" name="abastecimento_agua_outro">
                    </div>
                </div>
                <?php
                }else{
                ?>
                <div style="width: 45%;" class="hidden" id="abastecimento_agua_outro3">
                    <label>Outro:</label>
                    <br>
                    <div>
                        <input value="<?= $retorno->abastecimento_agua_outro ?>" type="text" style="width: 100%;" name="abastecimento_agua_outro">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div style="width: 50%;">
                <label>Condições de Uso de Água:</label>
                <br>
                <select name="condicao_agua" style="width: 100%;color:black;" id="condicao_agua">
                    <option value="" disabled selected><?= $retorno->condicao_agua ?></option>
                    <option value="Filtrada">Filtrada</option>
                    <option value="Fervida">Fervida</option>
                    <option value="Mineral">Mineral</option>
                    <option value="Sem cuidado prévio">Sem cuidado prévio</option>
                </select>
            </div>
            <div style="width: 50%;">
                <label>Destino de Lixo:</label>
                <br>
                <select name="destino_lixo" style="width: 100%;color:black;" id="destino_lixo">
                    <option value="" disabled selected><?= $retorno->destino_lixo ?></option>
                    <option value="Coleta pública">Coleta pública</option>
                    <option value="Queimado">Queimado</option>
                    <option value="Enterrado">Enterrado</option>
                    <option value="Céu aberto">Céu aberto</option>
                </select>
            </div>
            <div style="width: 50%;">
                <label>Destino de Dejetos:</label>
                <br>
                <select name="destino_dejetos" style="width: 100%;color:black;" id="destino_dejetos">
                    <option value="" disabled selected><?= $retorno->destino_dejetos ?></option>
                    <option value="Esgoto">Esgoto</option>
                    <option value="Fossa negra/seca">Fossa negra/seca</option>
                    <option value="Fossa séptica">Fossa séptica</option>
                    <option value="Céu aberto">Céu aberto</option>
                </select>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <input type="submit" value="> Composição Familiar" class="btn btn-info">
            </div>
            </form>
        </div>
        <?php
        }
        ?>
    </div>
</body>
<script src="dados_socioeconomicos.js"></script>
</html>