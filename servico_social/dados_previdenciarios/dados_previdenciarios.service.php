<?php
session_start();

class DadosPrevidenciariosService {
    private $conexao;
    private $dados_previdenciarios;

    public function __construct(Conexao $conexao, DadosPrevidenciarios $dados_previdenciarios) {
        $this->conexao = $conexao->conectar();
        $this->dados_previdenciarios = $dados_previdenciarios;
    }

    public function inserir() {
        // Consulta para obter o id_paciente
        $query2 = "SELECT id_paciente FROM pacientes WHERE nome_paciente = :nome_paciente";
        $stmt2 = $this->conexao->prepare($query2);
        $stmt2->bindValue(':nome_paciente', $_SESSION['nome_paciente']);
        $stmt2->execute();
        $id_paciente = $stmt2->fetchColumn();

        // Inserção dos dados previdenciários
        $query = 'INSERT INTO dados_previdenciarios(id_paciente, vinculo_previdenciario, categoria, status, beneficios, recebe_beneficio_assistencial, tipo_beneficio_assistencial) VALUES(:id_paciente, :vinculo_previdenciario, :categoria, :status, :beneficios, :recebe_beneficio_assistencial, :tipo_beneficio_assistencial)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $id_paciente);
        $stmt->bindValue(':vinculo_previdenciario', $this->dados_previdenciarios->__get('vinculo_previdenciario'));
        $stmt->bindValue(':categoria', $this->dados_previdenciarios->__get('categoria'));
        $stmt->bindValue(':status', $this->dados_previdenciarios->__get('status'));
        $stmt->bindValue(':beneficios', $this->dados_previdenciarios->__get('beneficios'));
        $stmt->bindValue(':recebe_beneficio_assistencial', $this->dados_previdenciarios->__get('recebe_beneficio_assistencial'));
        $stmt->bindValue(':tipo_beneficio_assistencial', $this->dados_previdenciarios->__get('tipo_beneficio_assistencial'));
        $stmt->execute();
    }
    
    public function nova_entrevista() {
        // Exclui os dados previdenciários existentes para o paciente
        $query2 = 'DELETE FROM dados_previdenciarios WHERE id_paciente = :id_paciente';
        $stmt2 = $this->conexao->prepare($query2);
        $stmt2->bindValue(':id_paciente', $_SESSION['id_paciente']);
        $stmt2->execute();
        
        // Insere os novos dados previdenciários
        $query = 'INSERT INTO dados_previdenciarios(id_paciente, vinculo_previdenciario, categoria, status, beneficios, recebe_beneficio_assistencial, tipo_beneficio_assistencial) VALUES(:id_paciente, :vinculo_previdenciario, :categoria, :status, :beneficios, :recebe_beneficio_assistencial, :tipo_beneficio_assistencial)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $_SESSION['id_paciente']);
        $stmt->bindValue(':vinculo_previdenciario', $this->dados_previdenciarios->__get('vinculo_previdenciario'));
        $stmt->bindValue(':categoria', $this->dados_previdenciarios->__get('categoria'));
        $stmt->bindValue(':status', $this->dados_previdenciarios->__get('status'));
        $stmt->bindValue(':beneficios', $this->dados_previdenciarios->__get('beneficios'));
        $stmt->bindValue(':recebe_beneficio_assistencial', $this->dados_previdenciarios->__get('recebe_beneficio_assistencial'));
        $stmt->bindValue(':tipo_beneficio_assistencial', $this->dados_previdenciarios->__get('tipo_beneficio_assistencial'));
        $stmt->execute();
    }

    public function recuperar() {
        $query = 'SELECT vinculo_previdenciario, categoria, status, beneficios, recebe_beneficio_assistencial, tipo_beneficio_assistencial FROM dados_previdenciarios WHERE id_paciente = :id_paciente';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $_SESSION['id_paciente'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function atualizar() {
        $query = 'UPDATE dados_previdenciarios SET ';
        $updates = [];
        $params = [];
        
        if ($this->dados_previdenciarios->__get('vinculo_previdenciario') !== null) {
            $updates[] = 'vinculo_previdenciario = :vinculo_previdenciario';
            $params[':vinculo_previdenciario'] = $this->dados_previdenciarios->__get('vinculo_previdenciario');
            
            if($this->dados_previdenciarios->__get('vinculo_previdenciario') == 'INSS' || 
            $this->dados_previdenciarios->__get('vinculo_previdenciario') == 'Federal' || 
            $this->dados_previdenciarios->__get('vinculo_previdenciario') == 'Municipal' || 
            $this->dados_previdenciarios->__get('vinculo_previdenciario') == 'Previdência Privada'){
                if ($this->dados_previdenciarios->__get('categoria') !== null) {
                    $updates[] = 'categoria = :categoria';
                    $params[':categoria'] = $this->dados_previdenciarios->__get('categoria');
                }
                if ($this->dados_previdenciarios->__get('status') !== null) {
                    $updates[] = 'status = :status';
                    $params[':status'] = $this->dados_previdenciarios->__get('status');
                }
            }else{
                $updates[] = 'categoria = NULL';
                $updates[] = 'status = NULL';
            }
        }
        if ($this->dados_previdenciarios->__get('beneficios') !== null) {
            $updates[] = 'beneficios = :beneficios';
            $params[':beneficios'] = $this->dados_previdenciarios->__get('beneficios');
        }
        if ($this->dados_previdenciarios->__get('recebe_beneficio_assistencial') !== null) {
            $updates[] = 'recebe_beneficio_assistencial = :recebe_beneficio_assistencial';
            $params[':recebe_beneficio_assistencial'] = $this->dados_previdenciarios->__get('recebe_beneficio_assistencial');
            
            if ($this->dados_previdenciarios->__get('recebe_beneficio_assistencial') == 'Sim') {
                if ($this->dados_previdenciarios->__get('tipo_beneficio_assistencial') !== null) {
                    $updates[] = 'tipo_beneficio_assistencial = :tipo_beneficio_assistencial';
                    $params[':tipo_beneficio_assistencial'] = $this->dados_previdenciarios->__get('tipo_beneficio_assistencial');
                }
            } else {
                $updates[] = 'tipo_beneficio_assistencial = NULL';
            }
        }
    
        if (!empty($updates)) {
            $query .= implode(', ', $updates) . ' WHERE id_paciente = :id_paciente';
            $params[':id_paciente'] = $_SESSION['id_paciente'];
            $stmt = $this->conexao->prepare($query);
            foreach ($params as $param => $value) {
                $stmt->bindValue($param, $value);
            }
            return $stmt->execute();
        } else {
            return false;
        }
    }
}
?>
