<?php
$host = "desenvolvimento.bd1.huufma.br";
$port = "5433";
$dbname = "estagio_eduardo_asocial";
$user = "eduardo.carvalho.3";
$password = "huufma@123";

// Criar conexão com PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Verificar conexão
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Verificar se há um parâmetro de consulta
if (isset($_GET['query'])) {
    $query = pg_escape_string($conn, $_GET['query']);
    $sql = "SELECT prontuario FROM entrevistas WHERE prontuario LIKE '$query%' LIMIT 10";
    $result = pg_query($conn, $sql);

    $prontuarios = [];
    if ($result && pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
            $prontuarios[] = $row['prontuario'];
        }
    }

    // Retornar os resultados como JSON
    echo json_encode($prontuarios);
}

// Fechar conexão
pg_close($conn);
?>
