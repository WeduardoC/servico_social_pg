<?php

session_start();
require_once 'Conexao.php';

$input = $_GET['nome_paciente'];

$conexao = new Conexao();
$pdo = $conexao->conectar();

try {
    $query = $pdo->prepare("SELECT id_paciente FROM entrevistas WHERE nome LIKE :input");
    $query->bindValue(':input', $input, PDO::PARAM_STR);
    $query->execute();
    
    // Buscar o resultado
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id_paciente'] = $result['id_paciente'];
    

} catch (PDOException $e) {
    // Em caso de erro, pode-se registrar o erro ou lidar com ele de outra forma
    error_log($e->getMessage()); // Registrar o erro (não exibir para o usuário em produção)
    $_SESSION['id_paciente'] = null; // Definir id_paciente como null em caso de erro
}

?>
