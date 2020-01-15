<?php
require_once "db_credentials.php";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, comment FROM $table";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Id: " . $row["id"]. '<br>'" - Nome: " . $row["name"]. " - Comentário:" . $row["comment"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tabela de comentário</title>
  </head>
  <body>
  	<div style='text-align:center'>
	    <h1>Todos os comentários do blog</h1>
		      <h4 class="featurette-heading">Comentários</h4>  
<fieldset>
            <legend>Listar Dados</legend>
            <ul>
                <?php
                    $SQL = "SELECT * from usuarios";
                    $query = mysql_query($SQL, $conn);
                    while($exibir = mysql_fetch_array($query)){
               
                ?>
                <li><?php echo $exibir("login")?> - Usuário</li>
                <?php
                    }
                ?>
            </ul>
                   
</fieldset>
    </div>
  </body>
</html>
