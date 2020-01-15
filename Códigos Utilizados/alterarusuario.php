<?php
require_once "db_credentials.php";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE users SET senha='senha1' WHERE id=1";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Erro ao updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
