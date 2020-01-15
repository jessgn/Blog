<?php
require_once "db_credentials.php";
//require_once "login.php";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Conexão falhou " . mysqli_connect_error());
}
 $error = false;
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $login = mysqli_real_escape_string($conn,$_POST['login']);
    $senha = mysqli_real_escape_string($conn,$_POST['senha']);

    if(empty($login) || empty($senha)){
      $error = true;
      $msg = "Preencha todos os campos.";
    }
    else{
      $sql = "INSERT INTO $table1 (login, senha)
              VALUES ('$login', '$senha')";
      if(!mysqli_query($conn, $sql))
        die('Problemas ao inserir na tabela' . mysqli_error($conn));
    }
  }
?>
<!DOCTYPE html>
<html>
 <head>
     <meta charset="UTF-8"/>
     <title>Trabalho Web</title>
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="style.css">
     <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
 </head>
 <body>
     <div class="wrapper page-extra">
          <nav class="top-section navbar">
               <div class="logo">
                    <a href="#">
                         <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100px" viewBox="0 0 2148.4 675.3" xml:space="preserve">
                         <path class="main-logo" d="M981.2,0l398.2,675h-183.8L889.3,155.8L582.9,675H480v0.2H296.2V183.8H0L108.2,0.2L778.3,0L670.1,183.8H480
                              v354.1L797.4,0l0,0h0L981.2,0L981.2,0L981.2,0z M709.2,491.7L601.1,675.3H1177l-108.4-183.8L709.2,491.7z M1925.1,186.4
                              c0.3,0.9,0.5,1.8,0.7,2.7c44.7,6.6,85.2,15.5,109.7,26.8l92-140.5c-80.5-43-192.5-75.2-320.1-75.2c-29.8,0-57.2,1.2-82.4,3.8
                              C1833.2,26.3,1897,84.7,1925.1,186.4z M1940.9,284.8l-209.3-36.1c-50-7.5-70.6-13.2-70.6-41.2c0-5.1,0.8-9.6,2.5-13.5
                              c-17.1-4.3-37.6-6.4-62.6-6.4h-105.8c-0.9,9.9-1.4,20.3-1.4,31.1c0,91.1,91.4,148.2,244.4,185.1c0-0.1,0-0.1,0.1-0.2l196.8,36.5
                              c17.5,5.4,26.1,13.4,26.1,29.9c0,24.2-12.9,34-42.6,37.6c-0.3,1-0.7,2-1,2.9c-16.2,45.1-40.4,79.8-73.7,106.3
                              c-29.6,23.5-65.8,40-110.4,50.1c33.7,3.7,68.1,5.6,102.5,5.6c223.8,0,312.7-70.7,312.7-225.6C2148.4,363.7,2069,316.2,1940.9,284.8z
                               M1600.9,177.3c27,0,49.2,2.4,67.8,7.3c36.5,9.6,60,23.2,73.9,55.3c2.1,0.3,4.2,0.6,6.4,0.9l7,1c67.9,10,123.6,21.4,169.9,28.4
                              c-2.6-32.5-6.3-54.6-13.4-80.3h0C1884.2,87.2,1817.3,31,1701.9,13.1c-27.7-4.3-58.9-6.5-92.7-6.5l-598,0.1l100.7,170.7H1600.9z
                               M1905.1,508.8c6.8-18.7,12.2-39.8,16.1-62.7c-10.5-2.2-23.4-4-39-6.3c-10.8-1.5-23-3.3-36.3-5.4c-34.9-5.6-67.6-11.9-97.1-18.6
                              c-12.5,39.5-37.4,63.3-77.6,74.5c-19.1,5.3-42.1,7.9-70.3,7.9h-299.8l100.7,170.8l207.4,0.1c37.8,0,72.3-2.7,102.5-8.2
                              C1812.8,642.6,1874.3,594.3,1905.1,508.8z"/>
                         </svg>
                    </a>
               </div>
          </nav>
          <div class="container">
               <div class="row login">
                    <div class="col-md-12"> 
                         <form class="login-form" method="POST" action="cadastro.php">
                            <?php
                                  if ($error) {
                                      echo $msg;
                                   }
                                ?>
                           <div class="flex-row">
                             <label class="lf--label" for="username">
                               <svg x="0px" y="0px" width="12px" height="13px">
                                 <path fill="#B1B7C4" d="M8.9,7.2C9,6.9,9,6.7,9,6.5v-4C9,1.1,7.9,0,6.5,0h-1C4.1,0,3,1.1,3,2.5v4c0,0.2,0,0.4,0.1,0.7 C1.3,7.8,0,9.5,0,11.5V13h12v-1.5C12,9.5,10.7,7.8,8.9,7.2z M4,2.5C4,1.7,4.7,1,5.5,1h1C7.3,1,8,1.7,8,2.5v4c0,0.2,0,0.4-0.1,0.6 l0.1,0L7.9,7.3C7.6,7.8,7.1,8.2,6.5,8.2h-1c-0.6,0-1.1-0.4-1.4-0.9L4.1,7.1l0.1,0C4,6.9,4,6.7,4,6.5V2.5z M11,12H1v-0.5 c0-1.6,1-2.9,2.4-3.4c0.5,0.7,1.2,1.1,2.1,1.1h1c0.8,0,1.6-0.4,2.1-1.1C10,8.5,11,9.9,11,11.5V12z"/>
                               </svg>
                             </label>
                             <input id="login" name="login" class="lf--input" placeholder="Nome de Usuário" type="text">
                           </div>
                           <div class="flex-row">
                             <label class="lf--label" for="password">
                               <svg x="0px" y="0px" width="15px" height="5px">
                                 <g>
                                   <path fill="#B1B7C4" d="M6,2L6,2c0-1.1-1-2-2.1-2H2.1C1,0,0,0.9,0,2.1v0.8C0,4.1,1,5,2.1,5h1.7C5,5,6,4.1,6,2.9V3h5v1h1V3h1v2h1V3h1 V2H6z M5.1,2.9c0,0.7-0.6,1.2-1.3,1.2H2.1c-0.7,0-1.3-0.6-1.3-1.2V2.1c0-0.7,0.6-1.2,1.3-1.2h1.7c0.7,0,1.3,0.6,1.3,1.2V2.9z"/>
                                 </g>
                               </svg>
                             </label>
                             <input id="senha" class="lf--input" placeholder="Senha" name="senha" type="password">
                           </div>
                           <input class="lf--submit" type="submit" value="Cadastrar">
                          <a class="lf--forgot" href="login.php">Voltar para Login</a>
                         </form>
                    </div>     
               </div>          
          </div>
     </div>
 </body>
</html>