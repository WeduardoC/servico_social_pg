<?php
session_start();

class EstiloVidaService {
    private $conexao;
    private $estilo_vida;

    public function __construct(Conexao $conexao, EstiloVida $estilo_vida) {
        $this->conexao = $conexao->conectar();
        $this->estilo_vida = $estilo_vida;
    }

    public function inserir() {
        // Busca o id_paciente baseado no nome do paciente da sessão
        $query2 = "SELECT id_paciente FROM pacientes WHERE nome_paciente = :nome_paciente";
        $stmt2 = $this->conexao->prepare($query2);
        $stmt2->bindValue(':nome_paciente', $_SESSION['nome_paciente']);
        $stmt2->execute();

        $id_paciente = $stmt2->fetchColumn();

        // Inserção de estilo de vida no PostgreSQL
        $query = 'INSERT INTO estilo_vida (id_paciente, elitismo, atividade_fisica, tabagismo, tempo_cigarro, cigarros_por_dia)
                  VALUES (:id_paciente, :elitismo, :atividade_fisica, :tabagismo, :tempo_cigarro, :cigarros_por_dia)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $id_paciente);
        $stmt->bindValue(':elitismo', $this->estilo_vida->__get('elitismo'));
        $stmt->bindValue(':atividade_fisica', $this->estilo_vida->__get('atividade_fisica'));
        $stmt->bindValue(':tabagismo', $this->estilo_vida->__get('tabagismo'));
        $stmt->bindValue(':tempo_cigarro', $this->estilo_vida->__get('tempo_cigarro'));
        $stmt->bindValue(':cigarros_por_dia', $this->estilo_vida->__get('cigarros_por_dia'));
        $stmt->execute();
    }

    public function nova_entrevista() {
        // Deletando o estilo de vida anterior do paciente
        $query2 = 'DELETE FROM estilo_vida WHERE id_paciente = :id_paciente';
        $stmt2 = $this->conexao->prepare($query2);
        $stmt2->bindValue(':id_paciente', $_SESSION['id_paciente']);
        $stmt2->execute();

        // Inserindo novos dados do estilo de vida
        $query = 'INSERT INTO estilo_vida (id_paciente, elitismo, atividade_fisica, tabagismo, tempo_cigarro, cigarros_por_dia)
                  VALUES (:id_paciente, :elitismo, :atividade_fisica, :tabagismo, :tempo_cigarro, :cigarros_por_dia)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $_SESSION['id_paciente']);
        $stmt->bindValue(':elitismo', $this->estilo_vida->__get('elitismo'));
        $stmt->bindValue(':atividade_fisica', $this->estilo_vida->__get('atividade_fisica'));
        $stmt->bindValue(':tabagismo', $this->estilo_vida->__get('tabagismo'));
        $stmt->bindValue(':tempo_cigarro', $this->estilo_vida->__get('tempo_cigarro'));
        $stmt->bindValue(':cigarros_por_dia', $this->estilo_vida->__get('cigarros_por_dia'));
        $stmt->execute();
    }

    public function recuperar() {
        // Recuperando o estilo de vida do paciente com base no id_paciente
        $query = "SELECT elitismo, atividade_fisica, tabagismo, tempo_cigarro, cigarros_por_dia
                  FROM estilo_vida WHERE id_paciente = :id_paciente";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $_SESSION['id_paciente']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function atualizar() {
        // Atualizando os registros do estilo de vida
        $query = 'UPDATE estilo_vida SET ';
        $updates = [];
        $params = [];

        // Verificando quais campos devem ser atualizados
        if ($this->estilo_vida->__get('elitismo') !== null) {
            $updates[] = 'elitismo = :elitismo';
            $params[':elitismo'] = $this->estilo_vida->__get('elitismo');
        }
        if ($this->estilo_vida->__get('atividade_fisica') !== null) {
            $updates[] = 'atividade_fisica = :atividade_fisica';
            $params[':atividade_fisica'] = $this->estilo_vida->__get('atividade_fisica');
        }
        if ($this->estilo_vida->__get('tabagismo') !== null) {
            $updates[] = 'tabagismo = :tabagismo';
            $params[':tabagismo'] = $this->estilo_vida->__get('tabagismo');

            if ($this->estilo_vida->__get('tabagismo') == 'Sim') {
                if ($this->estilo_vida->__get('tempo_cigarro') !== null) {
                    $updates[] = 'tempo_cigarro = :tempo_cigarro';
                    $params[':tempo_cigarro'] = $this->estilo_vida->__get('tempo_cigarro');
                }
                if ($this->estilo_vida->__get('cigarros_por_dia') !== null) {
                    $updates[] = 'cigarros_por_dia = :cigarros_por_dia';
                    $params[':cigarros_por_dia'] = $this->estilo_vida->__get('cigarros_por_dia');
                }
            } else {
                $updates[] = 'tempo_cigarro = NULL';
                $updates[] = 'cigarros_por_dia = NULL';
            }
        }

        // Executa a atualização se houver campos para atualizar
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
