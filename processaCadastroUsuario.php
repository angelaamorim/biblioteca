<?php
    if($_POST){
           //session_start();
           //if(isset($_SESSION['usuario'])){
                if(isset($_POST['login']) && isset($_POST['senha'])){
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    $sconexao = "host=localhost port=5432 dbname=biblioteca user=postgres password=123456";
                    $conexao = @pg_connect($sconexao);
                    $resultado = @pg_query($conexao, "INSERT INTO USUARIO(LOGIN,SENHA) VALUES ('$login','$senha');");
                    $numero_linhas = @pg_affected_rows($resultado);
                    if($numero_linhas != 0){
                        echo "<h3 style='color:green; margin-left:10px'>Usuário cadastrado com sucesso.";
                        include_once 'login.php';
                    }
                    else{
                        echo 'ops';
                        include_once 'index.html';
                    }
                }
            //}
    }
?>