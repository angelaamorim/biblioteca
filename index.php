<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Biblioteca</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <body>
        <?php
            @session_start();
            if(isset($_SESSION['usuario'])){
                $usuario = $_SESSION['usuario'];
        ?>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Biblioteca</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Bem vindo <?php echo $usuario ?></a></li>
            <li><a href="cadastrarLivro.php">Cadastrar Livro</a></li>
            <li><a href="cadastrarUsuario.php">Cadastrar Usuários</a></li>
            <li><a href="index.php">Livros</a></li>
            <li><a href="processaSair.php">Sair</a></li>
          </ul>
         </nav>
        <?php
                
                $sconexao = "host=ec2-54-243-124-240.compute-1.amazonaws.com port=5432 dbname=dcfr83fuj95lm7 user=rweuqlrlblxtap password=f1887ebdce0aec7840c48b0d84c4f037944425fdbb976c8d91601d922c8795c3";
                $conexao = @pg_connect($sconexao);
                $resultado = @pg_query($conexao, "SELECT * FROM LIVRO ORDER BY ID");
                $numero_linhas = @pg_affected_rows($resultado);
                echo "<h2 class='sub-header' style='margin:10px'>Livros</h2>";
                echo "<div class='table-responsive' style='margin:10px'>";
                if($numero_linhas != 0){
                    echo "<table class='table table-striped'>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Título</th>";
                    echo "<th>QTD Estoque</th>";
                    echo "<th>Ação</th>";
                    echo "</tr>";
                    while($linha = pg_fetch_array($resultado,null,PGSQL_ASSOC)){
                        $id= $linha['id'];
                        echo "<tr>";
                        echo "<td>".$linha['id']."</td>";
                        echo "<td>".$linha['nome']."</td>";
                        echo "<td>".$linha['quantidade_disponivel']."</td>";
                        echo "<td>"."<a href='processaReservaLivro.php?id=$id'>Reservar</a>"."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
                else{
                    echo '<br>Cadastre um livro';
                    include_once 'cadastrarLivro.html';
                }
            }
        ?>
    </body>
</html>


