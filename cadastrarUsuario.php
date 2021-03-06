<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Biblioteca</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->
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
    }
    ?>
    <div class="container">
      <form class="form-signin" action="processaCadastroUsuario.php" method="post">
        <h2 class="form-signin-heading">Cadastrar Usuário</h2>
        <label for="inputEmail" class="sr-only" >Usuário</label>
        <input type="text" id="inputText" class="form-control" placeholder="Usuário" required autofocus name="login">
        <label for="inputEmail" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required name="senha">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
      </form>
    </div> <!-- /container -->
  </body>
</html>

