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
    <link href="css/estilo.css" rel="stylesheet">
  </head>
  <body>
    <?php
        session_start();
        if(isset($_SESSION['usuario'])){
            $usuario = $_SESSION['usuario'];
    ?>
    <nav>
            <div class="menu col4 col-m-4">
                <ul>
                    <li>Bem vindo <?php echo $usuario ?> | </li>
                    <li><a href="index.php">Início</a> | </li>
                    <li><a href="cadastrarLivro.php">Cadastrar Livro</a> | </li>
                    <li><a href="index.php">Livros</a> | </li>
                    <li><a href="processaSair.php">Sair</a></li>
                </ul>
            </div>
         </nav>
        
    <div class="tabela col4 col-m-4">
      <form action="processaCadastroLivro.php" method="post">
        <h2>Cadastrar Livro</h2><br>
        <label for="inputEmail">Título:</label>
        <input type="text" id="inputText" placeholder="Título" required autofocus name="nome"><br><br>
        <label for="inputEmail">Qtd Disponível:</label>
        <input type="text" id="inputText" placeholder="Qtd Disponível" required name="qtd"><br><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
      </form>
    </div>
  </body>
</html>
<?php } ?>