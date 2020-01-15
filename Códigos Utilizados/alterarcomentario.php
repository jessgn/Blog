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
        echo "Id: " . $row["id"]. " Nome: " . $row["name"]. " Comentário:" . $row["comment"]. "<br>";
    }
} else {
    echo "0 results";
}
 $error = false;
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $id = mysqli_real_escape_string($conn,$_POST['id']);
   $name = mysqli_real_escape_string($conn,$_POST['name']);
   $comment = mysqli_real_escape_string($conn,$_POST['comment']);


 if(empty($id) || empty($name) || empty($comment)){
      $error = true;
      $msg = "Preencha todos os campos.";
    }

$sql = "UPDATE Comments SET name='$name', comment='$comment' WHERE id= $id";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Erro ao updating record: " . mysqli_error($conn);
}
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

    <title>Deletar comentário</title>
  </head>
  <body>
    <div style='text-align:center'>
      <h1>Insira o ID do comentário que deseja Alterar!</h1>
     <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <h4 class="featurette-heading">Comentário:</h4>  
       <input type="text" name="id" value="" placeholder="Digite o id"><br>
         <br>
         <input type="text" name="name" value="" placeholder="Digite o nome"><br>
         <br>
         <input type="text" name="comment" value="" placeholder="Digite o comentário"><br>
         <br>
    <input type="submit" name="" value="Alterar" class="btn btn-primary btn-xs">
    </div>
      </form>
  </body>
</html>
