<?php
require_once "db_credentials.php";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Conexão falhou " . mysqli_connect_error());
}

$sql = "INSERT INTO $table (name, comment)
VALUES ('Jéssica', 'bbbb')";

if (mysqli_query($conn, $sql)) {
    echo "Inserido com sucesso!";
} else {
    echo "Erro ao inserir na tabela: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
