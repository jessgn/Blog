<?php
  include "db_credentials.php";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if(!$conn){
    die('Problemas ao conectar no banco.');
  }

  $error = false;
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);

    if(empty($name) || empty($comment)){
      $error = true;
      $msg = "Preencha todos os campos.";
    }
    else{
      $sql = "INSERT INTO $table (name, comment)
              VALUES ('$name', '$comment')";
      if(!mysqli_query($conn, $sql))
        die('Problemas ao inserir na tabela' . mysqli_error($conn));
    }
  }

  $sql = "select * from $table";
  $comments = mysqli_query($conn, $sql);

  mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <script src="alerta.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Trabalho de Web</title>
  </head>
  <body>
    <head>
  <meta charset="utf-8">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
     <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100px" viewBox="0 0 2148.4 675.3" xml:space="preserve">
                         <path class="main-logo" fill="#fff" d="M981.2,0l398.2,675h-183.8L889.3,155.8L582.9,675H480v0.2H296.2V183.8H0L108.2,0.2L778.3,0L670.1,183.8H480
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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</head>

<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">

        <img src="trilogia.jpg" icons/placeholder.svg width="100%" height="100%" background="#777" color="#777" text=" " title=" " >
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>Saga Jogos Vorazes</h1>
            <p>The Hunger Games (Jogos Vorazes BRA ou Os Jogos da Fome PRT) é um livro de aventura, ação, distópico e pós-apocalíptico para jovens e adultos escrito pela norte-americana Suzanne Collins. O primeiro de uma trilogia que leva seu nome, foi originalmente publicado nos Estados Unidos em 14 de setembro de 2008 pela editora Scholastic, e lançado em Portugal e no Brasil, respectivamente, em 20 de outubro de 2009 pela Editorial Presença e 29 de maio de 2010 pela Rocco.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="hobbit.jpg" include icons/placeholder.svg width="100%" height="100%" background="#777" color="#777" text=" " title=" ">
        <div class="container">
          <div class="carousel-caption">
            <h1>Resenha sobre a obra " O hobbit"</h1>
            <p>Bilbo Bolseiro é um hobbit que leva uma vida confortável e sem ambições, raramente aventurando-se para além de sua despensa ou sua adega. Mas seu contentamento é perturbado quando Gandalf, o mago, e uma companhia de anões batem em sua porta e levam-no para uma expedição. Eles têm um plano para roubar o tesouro guardado por Smaug, O Magnífico, um grande e perigoso dragão. Bilbo reluta muito em participar da aventura, mas acaba surpreendendo até a si mesmo com sua esperteza e sua habilidade como ladrão!</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="got.jpg" include icons/placeholder.svg width="100%" height="100%" background="#777" color="#777" text=" " title=" ">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>A Guerra dos Tronos</h1>
            <p>A Game of Thrones é o primeiro livro da série de fantasia épica As Crônicas de Gelo e Fogo, escrita pelo norte-americano George R. R. Martin e publicada pela editora Bantam Spectra. Lançado originalmente em 6 de agosto de 1996, o livro venceu o Prêmio Locus de 1997 e o Prêmio Nebula de 1998, tendo sido indicado também ao World Fantasy Award de 1997.</p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
      <hr class="featurette-divider">


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
     
    
    <hr class="featurette-divider">

    <!-- START THE FEATURETTES -->

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">It: A coisa <span class="text-muted">(Stephen King)</span></h2>
        <p class="lead">O clássico de Stephen King em nova edição. O livro que inspirou os filmes. Durante as férias escolares de 1958, em Derry, pacata cidadezinha do Maine, Bill, Richie, Stan, Mike, Eddie, Ben e Beverly aprenderam o real sentido da amizade, do amor, da confiança e... do medo. O mais profundo e tenebroso medo. Naquele verão, eles enfrentaram pela primeira vez a Coisa, um ser sobrenatural e maligno que deixou terríveis marcas de sangue em Derry. Quase trinta anos depois, os amigos voltam a se encontrar. Uma nova onda de terror tomou a pequena cidade. Mike Hanlon, o único que permanece em Derry, dá o sinal. Precisam unir forças novamente. A Coisa volta a atacar e eles devem cumprir a promessa selada com sangue que fizeram quando crianças. Só eles têm a chave do enigma. Só eles sabem o que se esconde nas entranhas de Derry. O tempo é curto, mas somente eles podem vencer a Coisa. Em It: A Coisa, clássico de Stephen King em nova edição, os amigos irão até o fim, mesmo que isso signifique ultrapassar os próprios limites.</p>
      </div>
      <div class="col-md-5">
        <img src="it.jpg" icons/placeholder.svg width="500" height="500" background="#eee" color="#aaa" class="bd-placeholder-img-lg featurette-image img-fluid mx-auto">
      </div>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">A Guerra dos Tronos <span class="text-muted">(George R. R. Martin)</span></h2>
        <p class="lead">
          A Guerra dos Tronos é o primeiro livro da série de fantasia épica As Crônicas de Gelo e Fogo, escrita pelo norte-americano George R. R. Martin e publicada pela editora Bantam Spectra. Lançado originalmente em 6 de agosto de 1996, o livro venceu o Prêmio Locus de 1997 e o Prêmio Nebula de 1998, tendo sido indicado também ao World Fantasy Award de 1997. A novela Blood of the Dragon, compreendendo os capítulos de Daenerys Targaryen do romance, venceu o Prêmio Hugo de 1997 para "Melhor Novela".
          O livro dá nome a vários itens derivados baseados na saga, incluindo jogos de cartas colecionáveis, jogos de tabuleiro e um Role-playing game (RPG). Uma série televisiva baseada em As Crônicas de Gelo e Fogo, intitulada Game of Thrones, estreou em 17 de abril de 2011 nos Estados Unidos. Produzida pelo canal HBO, sua primeira temporada adapta o enredo de A Game of Thrones.No Brasil, a obra foi publicada pela editora LeYa em setembro de 2010 com o título A Guerra dos Tronos. Por sua extensão, em Portugal foi dividida em dois volumes, lançados em 2007 pela editora Saída de Emergência sob os títulos A Guerra dos Tronos e A Muralha de Gelo.
        </p>
      </div>
      <div class="col-md-5 order-md-1">
         <img src="game.jpg" icons/placeholder.svg width="500" height="500" background="#eee" color="#aaa" class="bd-placeholder-img-lg featurette-image img-fluid mx-auto">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
         <h2 class="featurette-heading">Diablo: Livro de Cain<span class="text-muted">(Bruno Galiza, Bruno Santos, Elton Mesquita e Flint Dille)</span></h2>
        <p class="lead">Narrado pelo personagem Deckard Cain, do jogo famoso da Blizzard Entertainment, Diablo III: Livro de Cain, reúne trechos, ilustrações e conhecimento inéditos para registrar a história do mundo de Santuário. Mistérios nunca esclarecidos são revelados nesta incrível edição de capa dura, entre eles a origem dos mortais, os segredos dos nefalem e a escuridão crescente do Fim dos Dias. Consagra a parceria com a Blizzard Entertainment, uma das maiores desenvolvedoras de softwares de entretenimento do mercado. A Blizzard é responsável pelos bem-sucedidos World of Warcraft, Warcraft, Starcraft e Diablo, alguns dos jogos mais aclamados pela crítica especializada. Dezesseis de seus jogos chegaram ao primeiro lugar em vendas e receberam diversos prêmios de Jogo do Ano. Seu serviço de jogos online é o maior do mundo, com milhões de usuários ativos. O universo de Warcraft vai virar filme.</p>
      </div>
      <div class="col-md-5">
        <img src="diablo.jpg" icons/placeholder.svg width="500" height="500" background="#eee" color="#aaa" class="bd-placeholder-img-lg featurette-image img-fluid mx-auto">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Saga Jogos Vorazes <span class="text-muted">(Suzanne Collins)</span> </h2>
                <h2 class="featurette-heading">Jogos Vorazes - <span class="text-muted"> Primeiro Livro </span></h2>
        <p class= "lead"> Na região antigamente conhecida como América do Norte, a Capital de Panem controla 12 distritos e os força a escolher um garoto e uma garota, conhecidos como tributos, para competir em um evento anual televisionado. Todos os cidadãos assistem aos temidos jogos, no qual os jovens lutam até a morte, de modo que apenas um saia vitorioso. A jovem Katniss Everdeen, do Distrito 12, confia na habilidade de caça e na destreza com o arco, além dos instintos aguçados, nesta competição mortal. 
          “Que a sorte esteja sempre a seu favor”. Tal oração talvez seja um armamento de fácil pronúncia, mas de difícil utilização no primeiro volume da trilogia literária futurista “Jogos Vorazes”, da escritora americana Suzanne Collins (Editora Rocco).
          A história ocorre em um futuro pós-apocalíptico e é narrada em primeira pessoa pela personagem Katniss Everdeen. O enredo do livro se desenvolve sob a sua rotina e sua relação com o melhor amigo, Gale (que possui um amor platônico por ela), a irmã Primrose e sua mãe. Sua moradia é o “Distrito 12”, uma região de um país de nome Panem. Comandados a mãos de ferro pelo presidente Coriolanus Snow, os cidadãos, com exceção dos da Capital, sofrem há 74 anos com a permanência dos chamados “Jogos Vorazes”, uma batalha televisionada na qual todos os participantes devem lutar até a morte.
        </p>
      </div>
      <div class="col-md-5 order-md-1">
         <img src="hunder1.jpg" icons/placeholder.svg width="500" height="700" background="#eee" color="#aaa" class="bd-placeholder-img-lg featurette-image img-fluid mx-auto">
      </div>
    </div>
     <div class="row featurette">
      <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Em chamas - <span class="text-muted"> Segundo Livro </span></h2>
        <p class= "lead">
          "As fagulhas se acendem, as chamas se espalham e a capital quer vingança."
        Antes de Katniss e Peeta embarcarem em uma turnê para os outros distritos, o presidente Snow faz uma vista a senhorita Everdeen e lhe diz que ela precisa convencer ele de que ela e Peeta são realmente um casal apaixonado que agiram por impulso nos jogos ou ela e todos que ela ama - sua mãe, Prim e Gale - estarão em grande perigo. Não vendo outra alternativa, já que tudo que tentou dá errado, ela e Peeta anunciam que vão se casar. Mas isso não convence Snow, apenas aumenta a fagulha que se espalhou pelos distritos.
        É quando surge o massacre quaternário - e quando a história realmente começa. Como as regras oficiais do jogo, dois tributos de cada distrito são escolhidos, mas dessa vez apenas entre os vitoriosos. E mais uma vez Katniss e Peeta voltam aos Jogos Vorazes, dessa vez com a promessa de que apenas um sairá de lá vivo.
        "Peeta me coloca na cama e me dá boa noite, mas pego a sua mão e não o deixo sair, não quero que ele vá embora. Na realidade, quero que ele se deite na cama comigo, que esteja ao meu lado quando os pesadelos chegarem."
        Katniss não está mais decidida a se salvar e voltar para casa como no primeiro livro, ela está decidida a salvar a vida de Peeta, mesmo que isso custe a sua vida. No decorrer do livro podemos perceber que ela está confusa com os seus sentimentos em relação a Peeta e Gale. Com quem Ketniss irá ficar afinal? Com Peeta ou com Gale?
        </p>
      </div>
      <div class="col-md-5 order-md-1">
         <img src="hunder2.jpg" icons/placeholder.svg width="500" height="700" background="#eee" color="#aaa" class="bd-placeholder-img-lg featurette-image img-fluid mx-auto">
      </div>
    </div>
    <div class="row featurette">
      <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">A esperança - <span class="text-muted"> Terceiro Livro</span></h2>
        <p class= "lead" > A esperança é um livro de aventura e ficção científica escrito pela norte-americana Suzanne Collins. O livro é o último da trilogia, precedido por Jogos Vorazes e Em Chamas. Continua a história de Katniss Everdeen na luta contra o governo totalitário de Panem. A série foi inspirada no mito grego de Teseu e o minotauro e nos gladiadores romanos. Valores como lealdade, guerra, pobreza, verdade e amor são abordados durante a trama. O livro em si é carregado de drama e possui críticas sobre a sociedade vivida por nós e pelos habitantes da Capital.
          esse livro final vamos ter as consequências de toda a história. Como vimos no livro anterior, Katniss explodiu a arena e foi resgatada por um pequeno grupo, com metade dos tributos restantes, e levada para o Distrito 13, que era tido como destruído desde a primeira revolta, que culminou na criação dos Jogos Vorazes. A outra metade, que inclui Peeta e Johanna, foi capturada pela Capital e não se sabe qual foi o destino deles.
         Katniss tem que lidar com sua própria mente. A paranoia já vista no livro anterior, vem muito mais forte a respeito da guerra vindoura e em ideias para destruir seu nêmeses, o Presidente Snow. Vinculado a isso, o Distrito 13 deseja usá-la como porta voz da revolução, através de propagandas que eles lançarão no sinal de TV da Capital, para que o povo dos demais Distritos possam se unir a eles rumo à revolução. Cabe a Katniss decidir se fará parte deste plano e rumar, junto aos Distritos, todos unidos, em prol da libertação.
                </p>
      </div>
      <div class="col-md-5 order-md-1">
         <img src="hunder3.jpg" icons/placeholder.svg width="500" height="700" background="#eee" color="#aaa" class="bd-placeholder-img-lg featurette-image img-fluid mx-auto">
      </div>
    </div>
        <hr class="featurette-divider">
         <div class="row featurette">
      <div class="col-md-7">
         <h2 class="featurette-heading">O hobbit<span class="text-muted">(J. R. R. Tolkien)</span></h2>
        <p class="lead">Bilbo Bolseiro vive uma vida tranquila e pacata em sua toca hobbit, até que um dia recebe a visita do Mago Gandalf, que o convida para fazer parte de uma grande aventura. O hobbit, entretanto, não gosta de nada que altere sua rotina, então recusa educadamente a oferta recebida, e com isso acredita estar livre de preocupações.
        Um pouco mais tarde sua casa é invadida por treze anões, liderados por Thorin Escudo de Carvalho. Eles, juntamente com Gandalf, pretendem contratar Bilbo para ser o ladrão de uma expedição em busca de recuperar o tesouro dos anões roubado por Smaug, um temido e perigoso dragão. Bilbo reluta em participar da aventura, mas, movido por algo dentro de si que antes desconhecia, acaba aceitando a proposta, e parte com Gandalf e os treze anãos rumo à Montanha Solitária.
        Durante a longa jornada, Bilbo e os anões deparam-se com trolls, elfos, orcs, lobos, e muitos seres mágicos. Eles passam por grandes apuros por conta de seus inimigos, mas conquistam amigos que os ajudam como podem. Com o passar do tempo, Bilbo se revela bastante esperto e corajoso, e acaba se tornando respeitado entre seus companheiros de expedição; vemos também como ele conhece Gollum e encontra o anel, que o ajuda em momentos de dificuldade.</p>
      </div>
      <div class="col-md-5">
        <img src="hobbit2.jpg" icons/placeholder.svg width="500" height="500" background="#eee" color="#aaa" class="bd-placeholder-img-lg featurette-image img-fluid mx-auto">
      </div>
    </div>
    <hr class="featurette-divider">
     <h2 class="featurette-heading">Comentários</h2>
     <?php
        if(mysqli_num_rows($comments) == 0){
          echo "Nenhum comentário cadastrado.";
        }
        else {
          while($comment = mysqli_fetch_assoc($comments)) {
            echo "<strong>De:</strong>" . $comment['name']. "<br>";
            echo "<p>" . $comment['comment'] . "</p>";
          }
            echo '<a href="alterarcomentario.php"><input type="button" onclick="funcao()" value="Alterar" class="btn btn-primary btn-xs"></a>';
            echo ' ';
            echo '<a href="deletarcomentario.php"><input type="button" onclick="funcao()" value="Excluir" class="btn btn-primary btn-xs"></a>';
            echo '<br>';
        }
      ?>
 
      <hr>
      <h3 class="featurette-heading">Novo comentário</h3>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
         <?php
           if ($error) {
           echo $msg;
            }
         ?>
      <h4 class="featurette-heading">Nome:</h4>  
        <input type="text" name="name" value="" placeholder="Seu nome"><br>
        <h4 class="featurette-heading">Comentário:</h4>
       <textarea name="comment" rows="8" cols="80"  placeholder="Seu comentário"></textarea><br>
              <input type="submit" name="" value="Enviar" onclick="funcao1()"class="btn btn-primary btn-xs">
            </div>
      </form>
    <hr class="featurette-divider">
  </div>

  <!-- FOOTER -->
  <footer class="container">
    <p>&copy; 2019 TADS&middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>