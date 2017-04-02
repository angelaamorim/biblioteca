<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        if(isset($_GET['id'])){
            $id = $_GET['id']; 
            $usuario = $_SESSION['usuario'];
            $sconexao = "host=localhost port=5432 dbname=biblioteca user=postgres password=123456";
            $conexao = @pg_connect($sconexao);
            $resultado = @pg_query($conexao, "UPDATE LIVRO SET (QUANTIDADE_DISPONIVEL) = (QUANTIDADE_DISPONIVEL::INTEGER - 1) WHERE ID=$id;");
            $numero_linhas = @pg_affected_rows($resultado);
            $log = @pg_query($conexao, "INSERT INTO RESERVA (ID_LIVRO, ID_USUARIO, DATA_EMPRESTIMO, DATA_DEVOLUCAO) VALUES ($id, (SELECT ID FROM USUARIO WHERE LOGIN = '$usuario'), now(), now()+ INTERVAL '10 days');");
            $numero_linhas_log = @pg_affected_rows($log);
            if($numero_linhas != 0 && $numero_linhas_log != 0){
                echo "<h3 style='color:green; margin-left:10px'>Titulo reservado com sucesso.</h3>";
                include_once 'index.php';
            }
            else{
                echo 'ops';
                include_once 'index.php';
            }
        }
    }
?>