<?php
session_start();

class EntrevistaService {
    private $conexao;
    private $paciente;
    private $entrevista;

    public function __construct(Conexao $conexao, Entrevista $entrevista, Paciente $paciente) {
        $this->conexao = $conexao->conectar();
        $this->paciente = $paciente;
        $this->entrevista = $entrevista;
    }

    public function inserir() {
        $query = 'INSERT INTO entrevistas (
            data_entrevista, prontuario, nome_paciente, 
            nome_social, sexo, cpf, rg, cartao_sus, naturalidade, data_nascimento,
            pai, mae, logradouro, bairro, complemento, cep, cidade, uf, 
            ponto_referencia, telefone, logradouro_origem, bairro_origem, complemento_origem, 
            cep_origem, cidade_origem, uf_origem, ponto_referencia_origem, 
            nome_responsavel, grau_parentesco_responsavel, telefone_responsavel, 
            observacao_responsavel, cuidador, telefone_cuidador, observacao_cuidador
        ) VALUES (
            :data_entrevista, :prontuario, :nome_paciente, 
            :nome_social, :sexo, :cpf, :rg, :cartao_sus, :naturalidade, :data_nascimento,
            :pai, :mae, :logradouro, :bairro, :complemento, :cep, :cidade, :uf, 
            :ponto_referencia, :telefone, :logradouro_origem, :bairro_origem, :complemento_origem, 
            :cep_origem, :cidade_origem, :uf_origem, :ponto_referencia_origem, 
            :nome_responsavel, :grau_parentesco_responsavel, :telefone_responsavel, 
            :observacao_responsavel, :cuidador, :telefone_cuidador, :observacao_cuidador
        )';

        $query2 = 'INSERT INTO pacientes(nome_paciente) VALUES(:nome_paciente)';
        $stmt2 = $this->conexao->prepare($query2);
        $stmt2->bindValue(':nome_paciente', $this->paciente->__get('nome_paciente'));
        $stmt2->execute();

        $stmt = $this->conexao->prepare($query);

        // Conversão PostgreSQL para bindValue:
        $stmt->bindValue(':data_entrevista', $this->entrevista->__get('data_entrevista'), PDO::PARAM_STR); 
        $stmt->bindValue(':prontuario', $this->entrevista->__get('prontuario'), PDO::PARAM_INT);
        $stmt->bindValue(':nome_paciente', $this->entrevista->__get('nome_paciente'), PDO::PARAM_STR);
        $stmt->bindValue(':nome_social', $this->entrevista->__get('nome_social'), PDO::PARAM_STR);
        $stmt->bindValue(':sexo', $this->entrevista->__get('sexo'), PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $this->entrevista->__get('cpf'), PDO::PARAM_STR);
        $stmt->bindValue(':rg', $this->entrevista->__get('rg'), PDO::PARAM_STR);
        $stmt->bindValue(':cartao_sus', $this->entrevista->__get('cartao_sus'), PDO::PARAM_STR);
        $stmt->bindValue(':naturalidade', $this->entrevista->__get('naturalidade'), PDO::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $this->entrevista->__get('data_nascimento'), PDO::PARAM_STR);
        $stmt->bindValue(':pai', $this->entrevista->__get('pai'), PDO::PARAM_STR);
        $stmt->bindValue(':mae', $this->entrevista->__get('mae'), PDO::PARAM_STR);
        $stmt->bindValue(':logradouro', $this->entrevista->__get('logradouro'), PDO::PARAM_STR);
        $stmt->bindValue(':bairro', $this->entrevista->__get('bairro'), PDO::PARAM_STR);
        $stmt->bindValue(':complemento', $this->entrevista->__get('complemento'), PDO::PARAM_STR);
        $stmt->bindValue(':cep', $this->entrevista->__get('cep'), PDO::PARAM_STR);
        $stmt->bindValue(':cidade', $this->entrevista->__get('cidade'), PDO::PARAM_STR);
        $stmt->bindValue(':uf', $this->entrevista->__get('uf'), PDO::PARAM_STR);
        $stmt->bindValue(':ponto_referencia', $this->entrevista->__get('ponto_referencia'), PDO::PARAM_STR);
        $stmt->bindValue(':telefone', $this->entrevista->__get('telefone'), PDO::PARAM_STR);
        $stmt->bindValue(':logradouro_origem', $this->entrevista->__get('logradouro_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':bairro_origem', $this->entrevista->__get('bairro_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':complemento_origem', $this->entrevista->__get('complemento_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':cep_origem', $this->entrevista->__get('cep_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':cidade_origem', $this->entrevista->__get('cidade_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':uf_origem', $this->entrevista->__get('uf_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':ponto_referencia_origem', $this->entrevista->__get('ponto_referencia_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':nome_responsavel', $this->entrevista->__get('nome_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':grau_parentesco_responsavel', $this->entrevista->__get('grau_parentesco_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':telefone_responsavel', $this->entrevista->__get('telefone_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':observacao_responsavel', $this->entrevista->__get('observacao_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':cuidador', $this->entrevista->__get('cuidador'), PDO::PARAM_STR);
        $stmt->bindValue(':telefone_cuidador', $this->entrevista->__get('telefone_cuidador'), PDO::PARAM_STR);
        $stmt->bindValue(':observacao_cuidador', $this->entrevista->__get('observacao_cuidador'), PDO::PARAM_STR);
        
        $stmt->execute();

        $query3 = "SELECT id_paciente FROM pacientes WHERE nome_paciente=:nome_paciente";
        $stmt3 = $this->conexao->prepare($query3);
        $stmt3->bindValue(':nome_paciente', $this->entrevista->__get('nome_paciente'));
        $stmt3->execute();
        $_SESSION['nome_paciente'] = $this->entrevista->__get('nome_paciente');

        $query4 = "UPDATE entrevistas SET id_paciente=:id_paciente WHERE nome_paciente=:nome_paciente";
        $stmt4 = $this->conexao->prepare($query4);
        $stmt4->bindValue(':id_paciente', $stmt3->fetch()[0], PDO::PARAM_INT);
        $stmt4->bindValue(':nome_paciente', $this->entrevista->__get('nome_paciente'), PDO::PARAM_STR);
        $stmt4->execute();
    }

    public function nova_entrevista() {
        $query2 = 'DELETE FROM entrevistas WHERE id_paciente = :id_paciente';
        $stmt2 = $this->conexao->prepare($query2);
        $stmt2->bindValue(':id_paciente', $_SESSION['id_paciente'], PDO::PARAM_INT);
        $stmt2->execute();

        $query3 = "SELECT nome_paciente FROM pacientes WHERE id_paciente=:id_paciente";
        $stmt3 = $this->conexao->prepare($query3);
        $stmt3->bindValue(':id_paciente', $_SESSION['id_paciente'], PDO::PARAM_INT);
        $stmt3->execute();

        $query = 'INSERT INTO entrevistas (
            id_paciente, data_entrevista, prontuario, nome_paciente, 
            nome_social, sexo, cpf, rg, cartao_sus, naturalidade, data_nascimento,
            pai, mae, logradouro, bairro, complemento, cep, cidade, uf, 
            ponto_referencia, telefone, logradouro_origem, bairro_origem, complemento_origem, 
            cep_origem, cidade_origem, uf_origem, ponto_referencia_origem, 
            nome_responsavel, grau_parentesco_responsavel, telefone_responsavel, 
            observacao_responsavel, cuidador, telefone_cuidador, observacao_cuidador
        ) VALUES (
            :id_paciente, :data_entrevista, :prontuario, :nome_paciente, 
            :nome_social, :sexo, :cpf, :rg, :cartao_sus, :naturalidade, :data_nascimento,
            :pai, :mae, :logradouro, :bairro, :complemento, :cep, :cidade, :uf, 
            :ponto_referencia, :telefone, :logradouro_origem, :bairro_origem, :complemento_origem, 
            :cep_origem, :cidade_origem, :uf_origem, :ponto_referencia_origem, 
            :nome_responsavel, :grau_parentesco_responsavel, :telefone_responsavel, 
            :observacao_responsavel, :cuidador, :telefone_cuidador, :observacao_cuidador
        )';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $_SESSION['id_paciente'], PDO::PARAM_INT);
        $stmt->bindValue(':data_entrevista', $this->entrevista->__get('data_entrevista'), PDO::PARAM_STR); 
        $stmt->bindValue(':prontuario', $this->entrevista->__get('prontuario'), PDO::PARAM_INT);
        $stmt->bindValue(':nome_paciente', $this->entrevista->__get('nome_paciente'), PDO::PARAM_STR);
        $stmt->bindValue(':nome_social', $this->entrevista->__get('nome_social'), PDO::PARAM_STR);
        $stmt->bindValue(':sexo', $this->entrevista->__get('sexo'), PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $this->entrevista->__get('cpf'), PDO::PARAM_STR);
        $stmt->bindValue(':rg', $this->entrevista->__get('rg'), PDO::PARAM_STR);
        $stmt->bindValue(':cartao_sus', $this->entrevista->__get('cartao_sus'), PDO::PARAM_STR);
        $stmt->bindValue(':naturalidade', $this->entrevista->__get('naturalidade'), PDO::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $this->entrevista->__get('data_nascimento'), PDO::PARAM_STR);
        $stmt->bindValue(':pai', $this->entrevista->__get('pai'), PDO::PARAM_STR);
        $stmt->bindValue(':mae', $this->entrevista->__get('mae'), PDO::PARAM_STR);
        $stmt->bindValue(':logradouro', $this->entrevista->__get('logradouro'), PDO::PARAM_STR);
        $stmt->bindValue(':bairro', $this->entrevista->__get('bairro'), PDO::PARAM_STR);
        $stmt->bindValue(':complemento', $this->entrevista->__get('complemento'), PDO::PARAM_STR);
        $stmt->bindValue(':cep', $this->entrevista->__get('cep'), PDO::PARAM_STR);
        $stmt->bindValue(':cidade', $this->entrevista->__get('cidade'), PDO::PARAM_STR);
        $stmt->bindValue(':uf', $this->entrevista->__get('uf'), PDO::PARAM_STR);
        $stmt->bindValue(':ponto_referencia', $this->entrevista->__get('ponto_referencia'), PDO::PARAM_STR);
        $stmt->bindValue(':telefone', $this->entrevista->__get('telefone'), PDO::PARAM_STR);
        $stmt->bindValue(':logradouro_origem', $this->entrevista->__get('logradouro_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':bairro_origem', $this->entrevista->__get('bairro_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':complemento_origem', $this->entrevista->__get('complemento_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':cep_origem', $this->entrevista->__get('cep_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':cidade_origem', $this->entrevista->__get('cidade_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':uf_origem', $this->entrevista->__get('uf_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':ponto_referencia_origem', $this->entrevista->__get('ponto_referencia_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':nome_responsavel', $this->entrevista->__get('nome_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':grau_parentesco_responsavel', $this->entrevista->__get('grau_parentesco_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':telefone_responsavel', $this->entrevista->__get('telefone_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':observacao_responsavel', $this->entrevista->__get('observacao_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':cuidador', $this->entrevista->__get('cuidador'), PDO::PARAM_STR);
        $stmt->bindValue(':telefone_cuidador', $this->entrevista->__get('telefone_cuidador'), PDO::PARAM_STR);
        $stmt->bindValue(':observacao_cuidador', $this->entrevista->__get('observacao_cuidador'), PDO::PARAM_STR);

        $stmt->execute();
    }

    public function recuperar() {
        $query = 'SELECT * FROM entrevistas WHERE id_paciente = :id_paciente';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $_SESSION['id_paciente'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function atualizar() {
        $query = 'UPDATE entrevistas SET 
            data_entrevista = :data_entrevista,
            prontuario = :prontuario,
            nome_paciente = :nome_paciente,
            nome_social = :nome_social,
            sexo = :sexo,
            cpf = :cpf,
            rg = :rg,
            cartao_sus = :cartao_sus,
            naturalidade = :naturalidade,
            data_nascimento = :data_nascimento,
            pai = :pai,
            mae = :mae,
            logradouro = :logradouro,
            bairro = :bairro,
            complemento = :complemento,
            cep = :cep,
            cidade = :cidade,
            uf = :uf,
            ponto_referencia = :ponto_referencia,
            telefone = :telefone,
            logradouro_origem = :logradouro_origem,
            bairro_origem = :bairro_origem,
            complemento_origem = :complemento_origem,
            cep_origem = :cep_origem,
            cidade_origem = :cidade_origem,
            uf_origem = :uf_origem,
            ponto_referencia_origem = :ponto_referencia_origem,
            nome_responsavel = :nome_responsavel,
            grau_parentesco_responsavel = :grau_parentesco_responsavel,
            telefone_responsavel = :telefone_responsavel,
            observacao_responsavel = :observacao_responsavel,
            cuidador = :cuidador,
            telefone_cuidador = :telefone_cuidador,
            observacao_cuidador = :observacao_cuidador
            WHERE id_paciente = :id_paciente';
    
        $stmt = $this->conexao->prepare($query);
    
        $stmt->bindValue(':data_entrevista', $this->entrevista->__get('data_entrevista'), PDO::PARAM_STR); 
        $stmt->bindValue(':prontuario', $this->entrevista->__get('prontuario'), PDO::PARAM_INT);
        $stmt->bindValue(':nome_paciente', $this->entrevista->__get('nome_paciente'), PDO::PARAM_STR);
        $stmt->bindValue(':nome_social', $this->entrevista->__get('nome_social'), PDO::PARAM_STR);
        $stmt->bindValue(':sexo', $this->entrevista->__get('sexo'), PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $this->entrevista->__get('cpf'), PDO::PARAM_STR);
        $stmt->bindValue(':rg', $this->entrevista->__get('rg'), PDO::PARAM_STR);
        $stmt->bindValue(':cartao_sus', $this->entrevista->__get('cartao_sus'), PDO::PARAM_STR);
        $stmt->bindValue(':naturalidade', $this->entrevista->__get('naturalidade'), PDO::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $this->entrevista->__get('data_nascimento'), PDO::PARAM_STR);
        $stmt->bindValue(':pai', $this->entrevista->__get('pai'), PDO::PARAM_STR);
        $stmt->bindValue(':mae', $this->entrevista->__get('mae'), PDO::PARAM_STR);
        $stmt->bindValue(':logradouro', $this->entrevista->__get('logradouro'), PDO::PARAM_STR);
        $stmt->bindValue(':bairro', $this->entrevista->__get('bairro'), PDO::PARAM_STR);
        $stmt->bindValue(':complemento', $this->entrevista->__get('complemento'), PDO::PARAM_STR);
        $stmt->bindValue(':cep', $this->entrevista->__get('cep'), PDO::PARAM_STR);
        $stmt->bindValue(':cidade', $this->entrevista->__get('cidade'), PDO::PARAM_STR);
        $stmt->bindValue(':uf', $this->entrevista->__get('uf'), PDO::PARAM_STR);
        $stmt->bindValue(':ponto_referencia', $this->entrevista->__get('ponto_referencia'), PDO::PARAM_STR);
        $stmt->bindValue(':telefone', $this->entrevista->__get('telefone'), PDO::PARAM_STR);
        $stmt->bindValue(':logradouro_origem', $this->entrevista->__get('logradouro_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':bairro_origem', $this->entrevista->__get('bairro_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':complemento_origem', $this->entrevista->__get('complemento_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':cep_origem', $this->entrevista->__get('cep_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':cidade_origem', $this->entrevista->__get('cidade_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':uf_origem', $this->entrevista->__get('uf_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':ponto_referencia_origem', $this->entrevista->__get('ponto_referencia_origem'), PDO::PARAM_STR);
        $stmt->bindValue(':nome_responsavel', $this->entrevista->__get('nome_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':grau_parentesco_responsavel', $this->entrevista->__get('grau_parentesco_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':telefone_responsavel', $this->entrevista->__get('telefone_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':observacao_responsavel', $this->entrevista->__get('observacao_responsavel'), PDO::PARAM_STR);
        $stmt->bindValue(':cuidador', $this->entrevista->__get('cuidador'), PDO::PARAM_STR);
        $stmt->bindValue(':telefone_cuidador', $this->entrevista->__get('telefone_cuidador'), PDO::PARAM_STR);
        $stmt->bindValue(':observacao_cuidador', $this->entrevista->__get('observacao_cuidador'), PDO::PARAM_STR);
        $stmt->bindValue(':id_paciente', $_SESSION['id_paciente'], PDO::PARAM_INT);
    
        $stmt->execute();
    }
    
}
