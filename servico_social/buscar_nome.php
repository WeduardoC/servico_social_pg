<?php

require_once 'Conexao.php';

$input = $_GET['input'];    
$conexao = new Conexao();
$pdo = $conexao->conectar();

try {
    $query = $pdo->prepare("SELECT prontuario, nome_paciente, data_nascimento FROM entrevistas WHERE nome_paciente LIKE :input");
    $query->bindValue(':input', $input, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    // Retornar os resultados como JSON
    echo json_encode($result);

} catch (PDOException $e) {
    // Em caso de erro, retornar mensagem de erro como JSON
    echo json_encode(['error' => $e->getMessage()]);
}

?>
