<?php
require_once "db_credentials.php";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, login, senha FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Id: " . $row["id"]. " - Login: " . $row["login"]. " - Senha:" . $row["senha"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
