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
        echo "Id: " . $row["id"]. " - Nome: " . $row["name"]. " - Comentário:" . $row["comment"]. "<br>";
    }
} else {
    echo "0 results";
}
 $error = false;
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $id = mysqli_real_escape_string($conn,$_POST['id']);
    if(empty($id)){
      $error = true;
      $msg = "Preencha o campo.";
    }
// sql to delete a record
$sql = "DELETE FROM $table WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
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
	    <h1>Insira o ID do comentário que deseja deletar!</h1>
		 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		      <h4 class="featurette-heading">Comentário:</h4>  
		   <input type="text" name="id" value="" placeholder="Digite o id"><br>
		     <br>
		<input type="submit" name="" value="Deletar" class="btn btn-primary btn-xs">
    </div>
      </form>
  </body>
</html>
