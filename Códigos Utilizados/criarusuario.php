<?php
  require_once "db_credentials.php";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
$sql= "CREATE TABLE users(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    login VARCHAR(50) NOT NULL,
 	senha VARCHAR(20) NOT NULL,
    reg_date TIMESTAMP
    )";
  if (mysqli_query($conn,$sql)){
  echo "Tabela criada com sucesso";
  }
else{
die
('Problemas ao criar tabela' . mysli_error($conn));
}
?>