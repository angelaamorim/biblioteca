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

    <link href="css/estilo.css" rel="stylesheet">

  </head>
    <body>
        <?php
            @session_start();
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
        <?php
                $sconexao = "host=ec2-54-243-124-240.compute-1.amazonaws.com port=5432 dbname=dcfr83fuj95lm7 user=rweuqlrlblxtap password=f1887ebdce0aec7840c48b0d84c4f037944425fdbb976c8d91601d922c8795c3";
                $conexao = @pg_connect($sconexao);
                $resultado = @pg_query($conexao, "SELECT * FROM LIVRO ORDER BY ID");
                $numero_linhas = @pg_affected_rows($resultado);
                echo "<h2>Livros</h2><br>";
                echo "<div class='tabela' style='margin:10px'>";
                if($numero_linhas != 0){
                    echo "<table>";
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


