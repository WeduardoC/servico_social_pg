<?php
class IntegrantesService {
    private $conexao;
    private $integrantes;

    public function __construct(Conexao $conexao, Integrantes $integrantes) {
        $this->conexao = $conexao->conectar();
        $this->integrantes = $integrantes;
    }

    public function inserir() {
        // Seleciona o id_paciente baseado no nome do paciente da sessão
        $query2 = "SELECT id_paciente FROM pacientes WHERE nome_paciente = :nome_paciente";
        $stmt2 = $this->conexao->prepare($query2);
        $stmt2->bindValue(':nome_paciente', $_SESSION['nome_paciente']);
        $stmt2->execute();
        $id_paciente = $stmt2->fetchColumn(); // Correção para fetch apenas da coluna

        // Insere os dados na tabela integrantes
        $query = 'INSERT INTO integrantes (id_paciente, nome_integrante, qtde, renda_rs, renda_sm) VALUES (:id_paciente, :nome_integrante, :qtde, :renda_rs, :renda_sm)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $id_paciente);
        $stmt->bindValue(':nome_integrante', $this->integrantes->__get('nome_integrante'));
        $stmt->bindValue(':qtde', $this->integrantes->__get('qtde'));
        $stmt->bindValue(':renda_rs', $this->integrantes->__get('renda_rs'));
        $stmt->bindValue(':renda_sm', $this->integrantes->__get('renda_sm'));
        $stmt->execute();
    }

    public function nova_entrevista() {
        // Deleta os registros anteriores dos integrantes do paciente
        $query2 = 'DELETE FROM integrantes WHERE id_paciente = :id_paciente';
        $stmt2 = $this->conexao->prepare($query2);
        $stmt2->bindValue(':id_paciente', $_SESSION['id_paciente']);
        $stmt2->execute();

        // Insere novos registros dos integrantes
        foreach ($this->integrantes_data as $data) {
            $query = 'INSERT INTO integrantes (id_paciente, nome_integrante, qtde, renda_rs, renda_sm) VALUES (:id_paciente, :nome_integrante, :qtde, :renda_rs, :renda_sm)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_paciente', $_SESSION['id_paciente']);
            $stmt->bindValue(':nome_integrante', $data['nome_integrante']);
            $stmt->bindValue(':qtde', $data['qtde']);
            $stmt->bindValue(':renda_rs', $data['renda_rs']);
            $stmt->bindValue(':renda_sm', $data['renda_sm']);
            $stmt->execute();
        }
    }

    public function recuperar() {
        // Recupera os registros dos integrantes com base no id_paciente
        $query = "SELECT nome_integrante, qtde, renda_rs, renda_sm FROM integrantes WHERE id_paciente = :id_paciente";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $_SESSION['id_paciente']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function atualizar() {
        // Atualiza o registro de um integrante específico
        $query = 'UPDATE integrantes SET nome_integrante = :nome_integrante, qtde = :qtde, renda_rs = :renda_rs, renda_sm = :renda_sm WHERE id_paciente = :id_paciente AND nome_integrante = :nome_integrante_antigo';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $this->integrantes->__get('id_paciente'));
        $stmt->bindValue(':nome_integrante', $this->integrantes->__get('nome_integrante'));
        $stmt->bindValue(':qtde', $this->integrantes->__get('qtde'));
        $stmt->bindValue(':renda_rs', $this->integrantes->__get('renda_rs'));
        $stmt->bindValue(':renda_sm', $this->integrantes->__get('renda_sm'));
        $stmt->bindValue(':nome_integrante_antigo', $this->integrantes->__get('nome_integrante_antigo'));
        $stmt->execute();
    }
}
?>
