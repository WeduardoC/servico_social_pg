<?php

require_once 'Conexao.php';

$input = $_GET['input'];
$conexao = new Conexao();
$pdo = $conexao->conectar(); 

try {
    $query = $pdo->prepare("SELECT prontuario, nome_paciente, data_nascimento FROM entrevistas WHERE prontuario LIKE :input");
    $query->bindValue(':input', $input, PDO::PARAM_STR);
    $query->execute();
    
    $result = $query->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

?>
