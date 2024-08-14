<?php
    require "dados_previdenciarios.model.php";
    require "dados_previdenciarios.service.php";
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
    <title>Dados Previdenciários</title>
</head>
<body>
    <div class="container">
        <?php
        require_once "../menu.php";
        ?>
        <!--Visualizar Dados-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'visualizar'){
            $dados_previdenciarios=new DadosPrevidenciarios();
            $conexao=new Conexao();
            $dados_previdenciarios_service = new DadosPrevidenciariosService($conexao,$dados_previdenciarios);
            $retorno=$dados_previdenciarios_service->recuperar();
        ?>
        <div class="conteudo" style="margin-left: 2%;">
            <div style="display: flex;flex-wrap: wrap;">
                <label style="margin-right: 10px;">Vínculo Previdenciário:</label>
                <label style="margin-right: 20px;"><input disabled type="radio" name="vinculo_previdenciario" value="INSS" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "INSS") echo 'checked'; ?>> INSS</label>
                <label style="margin-right: 20px;"><input disabled type="radio" name="vinculo_previdenciario" value="Federal" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "Federal") echo 'checked'; ?>> Federal</label>
                <label style="margin-right: 20px;"><input disabled type="radio" name="vinculo_previdenciario" value="Estadual" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "Estadual") echo 'checked'; ?>> Estadual</label>
                <label style="margin-right: 20px;"><input disabled type="radio" name="vinculo_previdenciario" value="Municipal" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "Municipal") echo 'checked'; ?>> Municipal</label>
                <label style="margin-right: 20px;"><input disabled type="radio" name="vinculo_previdenciario" value="Previdência Privada" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "Previdência Privada") echo 'checked'; ?>> Previdência Privada</label>
                <label><input disabled type="radio" name="vinculo_previdenciario" value="Sem Vínculo" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "Sem Vínculo") echo 'checked'; ?>> Sem Vínculo</label>
            </div>
            <?php
            if($retorno->vinculo_previdenciario == 'INSS' || 
            $retorno->vinculo_previdenciario == 'Federal' || 
            $retorno->vinculo_previdenciario == 'Municipal' || 
            $retorno->vinculo_previdenciario == 'Previdência Privada'){
            ?>
            <div  style="display: flex;justify-content: space-between;">
                <div style="width: 45%;">
                    <label>Categoria:</label>
                    <br>
                    <div>
                        <select name="categoria" style="width: 100%;" disabled>
                            <option><?= $retorno->categoria ?></option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;">
                    <label>Status:</label>
                    <br>
                    <div>
                        <select name="status" style="width: 100%;" disabled>
                            <option><?= $retorno->status ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <?php
            }
            $beneficios = [];
            if ($retorno->beneficios != null) {
                $beneficios = explode(",", $retorno->beneficios);
            }
            ?>
            <div style="display: flex;flex-wrap: wrap;">
                <label style="margin-right: 10px;">Benefícios:</label>
                <label style="margin-right: 20px;"><input disabled type="checkbox" name="beneficios[]" value="Incapacidade Temporária (Auxílio Doença)" <?php if (in_array('Incapacidade Temporária (Auxílio Doença)', $beneficios)) echo 'checked'; ?>> Incapacidade Temporária<br>(Auxílio Doença)</label>
                <label style="margin-right: 20px;"><input disabled type="checkbox" name="beneficios[]" value="Auxílio-acidente" <?php if (in_array('Auxílio-acidente', $beneficios)) echo 'checked'; ?>> Auxílio-acidente</label>
                <label style="margin-right: 20px;"><input disabled type="checkbox" name="beneficios[]" value="Auxílio-reclusão" <?php if (in_array('Auxílio-reclusão', $beneficios)) echo 'checked'; ?>> Auxílio-reclusão</label>
                <label><input disabled type="checkbox" name="beneficios[]" value="Salário-maternidade" <?php if (in_array('Salário-maternidade', $beneficios)) echo 'checked'; ?>> Salário-maternidade</label>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 45%;">
                    <label>Recebe Benefício Assistencial?</label>
                    <br>
                    <div>
                        <select required style="width: 100%;" name="recebe_beneficio_assistencial" disabled>
                            <option><?= $retorno->recebe_beneficio_assistencial ?></option>
                        </select>
                    </div>
                </div>
                <?php
                if($retorno->recebe_beneficio_assistencial == 'Sim'){
                ?>
                <div style="width: 50%;">
                    <label>Tipo de Benefício Assistencial:</label>
                    <br>
                    <div>
                        <select name="tipo_beneficio_assistencial" style="width: 100%;" disabled>
                            <option><?= $retorno->tipo_beneficio_assistencial ?></option>
                        </select>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <a class="btn btn-info" href="../estilo_vida/estilo_vida.php?acao=visualizar">> Estilo de Vida</a>
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
        <form action="dados_previdenciarios.controller.php?acao=inserir" method="post">
            <div style="display: flex;flex-wrap: wrap;">
                <label style="margin-right: 10px;">Vínculo Previdenciário:</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="INSS" onclick="toggleDiv(this.value)"> INSS</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Federal" onclick="toggleDiv(this.value)"> Federal</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Estadual" onclick="toggleDiv(this.value)"> Estadual</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Municipal" onclick="toggleDiv(this.value)"> Municipal</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Previdência Privada" onclick="toggleDiv(this.value)"> Previdência Privada</label>
                <label><input required type="radio" name="vinculo_previdenciario" value="Sem Vínculo" onclick="toggleDiv(this.value)"> Sem Vínculo</label>
            </div>
            <div id="categoria_status" class="hidden">
                <div style="width: 45%;">
                    <label>Categoria:</label>
                    <br>
                    <div>
                        <select name="categoria" style="width: 100%;">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Empregado">Empregado</option>
                            <option value="Empregado doméstico">Empregado doméstico</option>
                            <option value="Trabalhador avulso">Trabalhador avulso</option>
                            <option value="Contribuinte individual">Contribuinte individual</option>
                            <option value="Segurado especial">Segurado especial</option>
                            <option value="Segurado facultativo">Segurado facultativo</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;">
                    <label>Status:</label>
                    <br>
                    <div>
                        <select name="status" style="width: 100%;">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Aposentado">Aposentado</option>
                            <option value="Pensionista">Pensionista</option>
                            <option value="Desempregado">Desempregado</option>
                            <option value="Dependente">Dependente</option>
                            <option value="Aposentado e Pensionista">Aposentado e Pensionista</option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="display: flex;flex-wrap: wrap;">
                <label style="margin-right: 10px;">Benefícios:</label>
                <label style="margin-right: 20px;"><input type="checkbox" name="beneficios[]" value="Incapacidade Temporária (Auxílio Doença)"> Incapacidade Temporária<br>(Auxílio Doença)</label>
                <label style="margin-right: 20px;"><input type="checkbox" name="beneficios[]" value="Auxílio-acidente"> Auxílio-acidente</label>
                <label style="margin-right: 20px;"><input type="checkbox" name="beneficios[]" value="Auxílio-reclusão"> Auxílio-reclusão</label>
                <label><input type="checkbox" name="beneficios[]" value="Salário-maternidade"> Salário-maternidade</label>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 45%;">
                    <label>Recebe Benefício Assistencial?</label>
                    <br>
                    <div>
                        <select required id="recebe_beneficio_assistencial" style="width: 100%;color:black;" name="recebe_beneficio_assistencial">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Não">Não</option>
                            <option value="Sim">Sim</option>
                        </select>
                    </div>
                </div>
                <div id="tipo_beneficio_assistencial"  style="width: 50%;" class="hidden">
                    <label>Tipo de Benefício Assistencial:</label>
                    <br>
                    <div>
                        <select name="tipo_beneficio_assistencial" style="width: 100%;">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Benefício Assistencial ao idoso">Benefício Assistencial ao idoso</option>
                            <option value="Benefício Assistencial ao deficiente">Benefício Assistencial ao deficiente</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <input type="submit" value="> Estilo de Vida" class="btn btn-info">
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
        <form action="dados_previdenciarios.controller.php?acao=nova_entrevista" method="post">
            <div style="display: flex;flex-wrap: wrap;">
                <label style="margin-right: 10px;">Vínculo Previdenciário:</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="INSS" onclick="toggleDiv(this.value)"> INSS</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Federal" onclick="toggleDiv(this.value)"> Federal</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Estadual" onclick="toggleDiv(this.value)"> Estadual</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Municipal" onclick="toggleDiv(this.value)"> Municipal</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Previdência Privada" onclick="toggleDiv(this.value)"> Previdência Privada</label>
                <label><input required type="radio" name="vinculo_previdenciario" value="Sem Vínculo" onclick="toggleDiv(this.value)"> Sem Vínculo</label>
            </div>
            <div id="categoria_status" class="hidden">
                <div style="width: 45%;">
                    <label>Categoria:</label>
                    <br>
                    <div>
                        <select name="categoria" style="width: 100%;">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Empregado">Empregado</option>
                            <option value="Empregado doméstico">Empregado doméstico</option>
                            <option value="Trabalhador avulso">Trabalhador avulso</option>
                            <option value="Contribuinte individual">Contribuinte individual</option>
                            <option value="Segurado especial">Segurado especial</option>
                            <option value="Segurado facultativo">Segurado facultativo</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;">
                    <label>Status:</label>
                    <br>
                    <div>
                        <select name="status" style="width: 100%;">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Aposentado">Aposentado</option>
                            <option value="Pensionista">Pensionista</option>
                            <option value="Desempregado">Desempregado</option>
                            <option value="Dependente">Dependente</option>
                            <option value="Aposentado e Pensionista">Aposentado e Pensionista</option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="display: flex;flex-wrap: wrap;">
                <label style="margin-right: 10px;">Benefícios:</label>
                <label style="margin-right: 20px;"><input type="checkbox" name="beneficios[]" value="Incapacidade Temporária (Auxílio Doença)"> Incapacidade Temporária<br>(Auxílio Doença)</label>
                <label style="margin-right: 20px;"><input type="checkbox" name="beneficios[]" value="Auxílio-acidente"> Auxílio-acidente</label>
                <label style="margin-right: 20px;"><input type="checkbox" name="beneficios[]" value="Auxílio-reclusão"> Auxílio-reclusão</label>
                <label><input type="checkbox" name="beneficios[]" value="Salário-maternidade"> Salário-maternidade</label>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 45%;">
                    <label>Recebe Benefício Assistencial?</label>
                    <br>
                    <div>
                        <select required id="recebe_beneficio_assistencial" style="width: 100%;color:black;" name="recebe_beneficio_assistencial">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Não">Não</option>
                            <option value="Sim">Sim</option>
                        </select>
                    </div>
                </div>
                <div id="tipo_beneficio_assistencial" style="width: 50%;" class="hidden">
                    <label>Tipo de Benefício Assistencial:</label>
                    <br>
                    <div>
                        <select name="tipo_beneficio_assistencial" style="width: 100%;">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Benefício Assistencial ao idoso">Benefício Assistencial ao idoso</option>
                            <option value="Benefício Assistencial ao deficiente">Benefício Assistencial ao deficiente</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <input type="submit" value="> Estilo de Vida" class="btn btn-info">
            </div>
        </form>
        </div>
        <?php
        }
        ?>
        <!--Atualizar Dados-->
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'atualizar'){
            $dados_previdenciarios=new DadosPrevidenciarios();
            $conexao=new Conexao();
            $dados_previdenciarios_service = new DadosPrevidenciariosService($conexao,$dados_previdenciarios);
            $retorno=$dados_previdenciarios_service->recuperar();
        ?>
        <div class="conteudo" style="margin-left: 2%;">
        <form action="dados_previdenciarios.controller.php?acao=atualizar" method="post">
            <div style="display: flex;flex-wrap: wrap;">
                <label style="margin-right: 10px;">Vínculo Previdenciário:</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="INSS" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "INSS") echo 'checked'; ?>> INSS</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Federal" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "Federal") echo 'checked'; ?>> Federal</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Estadual" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "Estadual") echo 'checked'; ?>> Estadual</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Municipal" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "Municipal") echo 'checked'; ?>> Municipal</label>
                <label style="margin-right: 20px;"><input required type="radio" name="vinculo_previdenciario" value="Previdência Privada" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "Previdência Privada") echo 'checked'; ?>> Previdência Privada</label>
                <label><input required type="radio" name="vinculo_previdenciario" value="Sem Vínculo" onclick="toggleDiv(this.value)" <?php if ($retorno->vinculo_previdenciario == "Sem Vínculo") echo 'checked'; ?>> Sem Vínculo</label>
            </div>
            <?php
            if($retorno->vinculo_previdenciario == 'INSS' || 
            $retorno->vinculo_previdenciario == 'Federal' || 
            $retorno->vinculo_previdenciario == 'Municipal' || 
            $retorno->vinculo_previdenciario == 'Previdência Privada'){
            ?>
            <div id="categoria_status">
            <div style="display:flex;justify-content:space-around;width:100%;">
                <div style="width: 45%;">
                    <label>Categoria:</label>
                    <br>
                    <div>
                        <select name="categoria" style="width: 100%;">
                            <option value="" disabled selected><?= $retorno->categoria ?></option>
                            <option value="Empregado">Empregado</option>
                            <option value="Empregado doméstico">Empregado doméstico</option>
                            <option value="Trabalhador avulso">Trabalhador avulso</option>
                            <option value="Contribuinte individual">Contribuinte individual</option>
                            <option value="Segurado especial">Segurado especial</option>
                            <option value="Segurado facultativo">Segurado facultativo</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;">
                    <label>Status:</label>
                    <br>
                    <div>
                        <select name="status" style="width: 100%;">
                            <option value="" disabled selected><?= $retorno->status ?></option>
                            <option value="Ativo">Ativo</option>
                            <option value="Aposentado">Aposentado</option>
                            <option value="Pensionista">Pensionista</option>
                            <option value="Desempregado">Desempregado</option>
                            <option value="Dependente">Dependente</option>
                            <option value="Aposentado e Pensionista">Aposentado e Pensionista</option>
                        </select>
                    </div>
                </div>
            </div>
            </div>
            <?php
            }else{ 
            ?>
            <div class="hidden" id="categoria_status">
            <div style="display:flex;justify-content:space-around;width:100%;">
                <div style="width: 45%;">
                    <label>Categoria:</label>
                    <br>
                    <div>
                        <select name="categoria" style="width: 100%;">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Empregado">Empregado</option>
                            <option value="Empregado doméstico">Empregado doméstico</option>
                            <option value="Trabalhador avulso">Trabalhador avulso</option>
                            <option value="Contribuinte individual">Contribuinte individual</option>
                            <option value="Segurado especial">Segurado especial</option>
                            <option value="Segurado facultativo">Segurado facultativo</option>
                        </select>
                    </div>
                </div>
                <div style="width: 45%;">
                    <label>Status:</label>
                    <br>
                    <div>
                        <select name="status" style="width: 100%;">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Aposentado">Aposentado</option>
                            <option value="Pensionista">Pensionista</option>
                            <option value="Desempregado">Desempregado</option>
                            <option value="Dependente">Dependente</option>
                            <option value="Aposentado e Pensionista">Aposentado e Pensionista</option>
                        </select>
                    </div>
                </div>
            </div> 
            </div>
            <?php
            }
            $beneficios = [];
            if ($retorno->beneficios != null) {
                $beneficios = explode(",", $retorno->beneficios);
            }
            ?>
            <div style="display: flex;flex-wrap: wrap;">
                <label style="margin-right: 10px;">Benefícios:</label>
                <label style="margin-right: 20px;"><input type="checkbox" name="beneficios[]" value="Incapacidade Temporária (Auxílio Doença)" <?php if (in_array('Incapacidade Temporária (Auxílio Doença)', $beneficios)) echo 'checked'; ?>> Incapacidade Temporária<br>(Auxílio Doença)</label>
                <label style="margin-right: 20px;"><input type="checkbox" name="beneficios[]" value="Auxílio-acidente" <?php if (in_array('Auxílio-acidente', $beneficios)) echo 'checked'; ?>> Auxílio-acidente</label>
                <label style="margin-right: 20px;"><input type="checkbox" name="beneficios[]" value="Auxílio-reclusão" <?php if (in_array('Auxílio-reclusão', $beneficios)) echo 'checked'; ?>> Auxílio-reclusão</label>
                <label><input type="checkbox" name="beneficios[]" value="Salário-maternidade" <?php if (in_array('Salário-maternidade', $beneficios)) echo 'checked'; ?>> Salário-maternidade</label>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <div style="width: 45%;">
                    <label>Recebe Benefício Assistencial?</label>
                    <br>
                    <div>
                        <select id="recebe_beneficio_assistencial" style="width: 100%;color:black;" name="recebe_beneficio_assistencial">
                            <option value="" disabled selected><?= $retorno->recebe_beneficio_assistencial ?></option>
                            <option value="Não">Não</option>
                            <option value="Sim">Sim</option>
                        </select>
                    </div>
                </div>
                <?php
                if($retorno->recebe_beneficio_assistencial == 'Sim'){
                ?>
                <div id="tipo_beneficio_assistencial" style="width: 50%;">
                    <label>Tipo de Benefício Assistencial:</label>
                    <br>
                    <div>
                        <select name="tipo_beneficio_assistencial" style="width: 100%;">
                            <option value="" disabled selected><?= $retorno->tipo_beneficio_assistencial ?></option>
                            <option value="Benefício Assistencial ao idoso">Benefício Assistencial ao idoso</option>
                            <option value="Benefício Assistencial ao deficiente">Benefício Assistencial ao deficiente</option>
                        </select>
                    </div>
                </div>
                <?php
                }else{
                ?>
                <div id="tipo_beneficio_assistencial" style="width: 50%;" class="hidden">
                    <label>Tipo de Benefício Assistencial:</label>
                    <br>
                    <div>
                        <select name="tipo_beneficio_assistencial" style="width: 100%;">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Benefício Assistencial ao idoso">Benefício Assistencial ao idoso</option>
                            <option value="Benefício Assistencial ao deficiente">Benefício Assistencial ao deficiente</option>
                        </select>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <hr>
            <div class="botao" style="display: flex;justify-content: end;">
                <input type="submit" value="> Estilo de Vida" class="btn btn-info">
            </div>
        </form>
        </div>
        <?php
        }
        ?>
    </div>
</body>
<script src="dados_previdenciarios.js"></script>
</html>