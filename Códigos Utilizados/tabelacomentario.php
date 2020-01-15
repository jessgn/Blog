<?php
  include "db_credentials.php";
  // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Conexão falhou " . mysqli_connect_error());
}
  // sql to create table
  $sql = "CREATE TABLE Comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    comment VARCHAR(250) NOT NULL,
    reg_date TIMESTAMP
  )";

  if (mysqli_query($conn, $sql)) {
      echo "Table Comments created successfully";
  } else {
      echo "Error creating table: " . mysqli_error($conn);
  }
?>
