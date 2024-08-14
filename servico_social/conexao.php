<?php

class Conexao {
    private $host = 'desenvolvimento.bd1.huufma.br';
    private $port = '5433';
    private $dbname = 'estagio_eduardo_asocial';
    private $user = 'eduardo.carvalho.3';
    private $pass = 'huufma@123';

    public function conectar() {
        try {
            $conexao = new PDO(
                "pgsql:host=$this->host;port=$this->port;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            // Configurar o modo de erro do PDO para exceções       
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexao;

        } catch (PDOException $e) {
            echo '<p>'.$e->getMessage().'</p>';
        }
    }
}

?>
