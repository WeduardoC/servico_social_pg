<?php
session_start();

class DadosSocioeconomicosService {
    private $conexao;
    private $dados_socioeconomicos;

    public function __construct(Conexao $conexao, DadosSocioeconomicos $dados_socioeconomicos) {
        $this->conexao = $conexao->conectar();
        $this->dados_socioeconomicos = $dados_socioeconomicos;
    }

    public function inserir() {
        // Busca o id do paciente baseado no nome
        $query2 = "SELECT id_paciente FROM pacientes WHERE nome_paciente = :nome_paciente";
        $stmt2 = $this->conexao->prepare($query2);
        $stmt2->bindValue(':nome_paciente', $_SESSION['nome_paciente']);
        $stmt2->execute();
        
        // Prepara a consulta de inserção
        $query = 'INSERT INTO dados_socioeconomicos (
            id_paciente,
            estado_civil,
            grupo_etnico,
            religiosidade,
            escolaridade,
            profissao,
            ocupacao,
            habitacao,
            habitacao_outro,
            condicao_ocupacao,
            condicao_ocupacao_outro,
            numero_comodos,
            paredes,
            paredes_outro,
            cobertura,
            cobertura_outro,
            piso,
            eletricidade,
            abastecimento_agua,
            abastecimento_agua_outro,
            condicao_agua,
            destino_lixo,
            destino_dejetos
        ) VALUES (
            :id_paciente,
            :estado_civil,
            :grupo_etnico,
            :religiosidade,
            :escolaridade,
            :profissao,
            :ocupacao,
            :habitacao,
            :habitacao_outro,
            :condicao_ocupacao,
            :condicao_ocupacao_outro,
            :numero_comodos,
            :paredes,
            :paredes_outro,
            :cobertura,
            :cobertura_outro,
            :piso,
            :eletricidade,
            :abastecimento_agua,
            :abastecimento_agua_outro,
            :condicao_agua,
            :destino_lixo,
            :destino_dejetos
        )';
        $stmt = $this->conexao->prepare($query);

        $id_paciente = $stmt2->fetchColumn();
        $stmt->bindValue(':id_paciente', $id_paciente);
        $stmt->bindValue(':estado_civil', $this->dados_socioeconomicos->__get('estado_civil'));
        $stmt->bindValue(':grupo_etnico', $this->dados_socioeconomicos->__get('grupo_etnico'));
        $stmt->bindValue(':religiosidade', $this->dados_socioeconomicos->__get('religiosidade'));
        $stmt->bindValue(':escolaridade', $this->dados_socioeconomicos->__get('escolaridade'));
        $stmt->bindValue(':profissao', $this->dados_socioeconomicos->__get('profissao'));
        $stmt->bindValue(':ocupacao', $this->dados_socioeconomicos->__get('ocupacao'));
        $stmt->bindValue(':habitacao', $this->dados_socioeconomicos->__get('habitacao'));
        $stmt->bindValue(':habitacao_outro', $this->dados_socioeconomicos->__get('habitacao_outro'));
        $stmt->bindValue(':condicao_ocupacao', $this->dados_socioeconomicos->__get('condicao_ocupacao'));
        $stmt->bindValue(':condicao_ocupacao_outro', $this->dados_socioeconomicos->__get('condicao_ocupacao_outro'));
        $stmt->bindValue(':numero_comodos', $this->dados_socioeconomicos->__get('numero_comodos'));
        $stmt->bindValue(':paredes', $this->dados_socioeconomicos->__get('paredes'));
        $stmt->bindValue(':paredes_outro', $this->dados_socioeconomicos->__get('paredes_outro'));
        $stmt->bindValue(':cobertura', $this->dados_socioeconomicos->__get('cobertura'));
        $stmt->bindValue(':cobertura_outro', $this->dados_socioeconomicos->__get('cobertura_outro'));
        $stmt->bindValue(':piso', $this->dados_socioeconomicos->__get('piso'));
        $stmt->bindValue(':eletricidade', $this->dados_socioeconomicos->__get('eletricidade'));
        $stmt->bindValue(':abastecimento_agua', $this->dados_socioeconomicos->__get('abastecimento_agua'));
        $stmt->bindValue(':abastecimento_agua_outro', $this->dados_socioeconomicos->__get('abastecimento_agua_outro'));
        $stmt->bindValue(':condicao_agua', $this->dados_socioeconomicos->__get('condicao_agua'));
        $stmt->bindValue(':destino_lixo', $this->dados_socioeconomicos->__get('destino_lixo'));
        $stmt->bindValue(':destino_dejetos', $this->dados_socioeconomicos->__get('destino_dejetos'));

        $stmt->execute();
    }

    public function nova_entrevista() {
        // Remove os dados anteriores
        $query2 = 'DELETE FROM dados_socioeconomicos WHERE id_paciente = :id_paciente';
        $stmt2 = $this->conexao->prepare($query2);
        $stmt2->bindValue(':id_paciente', $_SESSION['id_paciente']);
        $stmt2->execute();
        
        // Prepara a consulta de inserção
        $query = 'INSERT INTO dados_socioeconomicos (
            id_paciente,
            estado_civil,
            grupo_etnico,
            religiosidade,
            escolaridade,
            profissao,
            ocupacao,
            habitacao,
            habitacao_outro,
            condicao_ocupacao,
            condicao_ocupacao_outro,
            numero_comodos,
            paredes,
            paredes_outro,
            cobertura,
            cobertura_outro,
            piso,
            eletricidade,
            abastecimento_agua,
            abastecimento_agua_outro,
            condicao_agua,
            destino_lixo,
            destino_dejetos
        ) VALUES (
            :id_paciente,
            :estado_civil,
            :grupo_etnico,
            :religiosidade,
            :escolaridade,
            :profissao,
            :ocupacao,
            :habitacao,
            :habitacao_outro,
            :condicao_ocupacao,
            :condicao_ocupacao_outro,
            :numero_comodos,
            :paredes,
            :paredes_outro,
            :cobertura,
            :cobertura_outro,
            :piso,
            :eletricidade,
            :abastecimento_agua,
            :abastecimento_agua_outro,
            :condicao_agua,
            :destino_lixo,
            :destino_dejetos
        )';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $_SESSION['id_paciente']);
        $stmt->bindValue(':estado_civil', $this->dados_socioeconomicos->__get('estado_civil'));
        $stmt->bindValue(':grupo_etnico', $this->dados_socioeconomicos->__get('grupo_etnico'));
        $stmt->bindValue(':religiosidade', $this->dados_socioeconomicos->__get('religiosidade'));
        $stmt->bindValue(':escolaridade', $this->dados_socioeconomicos->__get('escolaridade'));
        $stmt->bindValue(':profissao', $this->dados_socioeconomicos->__get('profissao'));
        $stmt->bindValue(':ocupacao', $this->dados_socioeconomicos->__get('ocupacao'));
        $stmt->bindValue(':habitacao', $this->dados_socioeconomicos->__get('habitacao'));
        $stmt->bindValue(':habitacao_outro', $this->dados_socioeconomicos->__get('habitacao_outro'));
        $stmt->bindValue(':condicao_ocupacao', $this->dados_socioeconomicos->__get('condicao_ocupacao'));
        $stmt->bindValue(':condicao_ocupacao_outro', $this->dados_socioeconomicos->__get('condicao_ocupacao_outro'));
        $stmt->bindValue(':numero_comodos', $this->dados_socioeconomicos->__get('numero_comodos'));
        $stmt->bindValue(':paredes', $this->dados_socioeconomicos->__get('paredes'));
        $stmt->bindValue(':paredes_outro', $this->dados_socioeconomicos->__get('paredes_outro'));
        $stmt->bindValue(':cobertura', $this->dados_socioeconomicos->__get('cobertura'));
        $stmt->bindValue(':cobertura_outro', $this->dados_socioeconomicos->__get('cobertura_outro'));
        $stmt->bindValue(':piso', $this->dados_socioeconomicos->__get('piso'));
        $stmt->bindValue(':eletricidade', $this->dados_socioeconomicos->__get('eletricidade'));
        $stmt->bindValue(':abastecimento_agua', $this->dados_socioeconomicos->__get('abastecimento_agua'));
        $stmt->bindValue(':abastecimento_agua_outro', $this->dados_socioeconomicos->__get('abastecimento_agua_outro'));
        $stmt->bindValue(':condicao_agua', $this->dados_socioeconomicos->__get('condicao_agua'));
        $stmt->bindValue(':destino_lixo', $this->dados_socioeconomicos->__get('destino_lixo'));
        $stmt->bindValue(':destino_dejetos', $this->dados_socioeconomicos->__get('destino_dejetos'));
        $stmt->execute();
    }

    public function recuperar() {
        $query = "SELECT 
            estado_civil,
            grupo_etnico,
            religiosidade,
            escolaridade,
            profissao,
            ocupacao,
            habitacao,
            habitacao_outro,
            condicao_ocupacao,
            condicao_ocupacao_outro,
            numero_comodos,
            paredes,
            paredes_outro,
            cobertura,
            cobertura_outro,
            piso,
            eletricidade,
            abastecimento_agua,
            abastecimento_agua_outro,
            condicao_agua,
            destino_lixo,
            destino_dejetos
        FROM dados_socioeconomicos 
        WHERE id_paciente = :id_paciente";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $_SESSION['id_paciente']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function atualizar() {
        // Define a consulta SQL inicial
        $query = 'UPDATE dados_socioeconomicos SET ';
        $updates = [];
        $params = [];
        
        // Lista de atributos para serem atualizados
        $attributes = [
            'estado_civil', 'grupo_etnico', 'religiosidade', 'escolaridade', 'profissao', 
            'ocupacao', 'habitacao', 'habitacao_outro', 'condicao_ocupacao', 
            'condicao_ocupacao_outro', 'numero_comodos', 'paredes', 'paredes_outro', 
            'cobertura', 'cobertura_outro', 'piso', 'eletricidade', 'abastecimento_agua', 
            'abastecimento_agua_outro', 'condicao_agua', 'destino_lixo', 'destino_dejetos'
        ];
    
        // Adiciona a atualização para cada atributo que não é nulo
        foreach ($attributes as $attribute) {
            $value = $this->dados_socioeconomicos->__get($attribute);
            if ($value !== null) {
                $updates[] = "$attribute = :$attribute";
                $params[":$attribute"] = $value;
            }
        }

        if (!empty($updates)) {
            $query .= implode(', ', $updates) . ' WHERE id_paciente = :id_paciente';
            $params[':id_paciente'] = $_SESSION['id_paciente'];
    
            // Prepara a consulta
            $stmt = $this->conexao->prepare($query);
    
            // Associa os valores dos parâmetros
            foreach ($params as $param => $value) {
                $stmt->bindValue($param, $value);
            }
    
            // Executa a consulta e retorna o resultado
            return $stmt->execute();
        } else {
            // Retorna false se não houver atualizações
            return false;
        }
    }
    

}

?>
