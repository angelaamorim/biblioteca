<?php
    if($_POST){
                if(isset($_POST['login']) && isset($_POST['senha'])){
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    $sconexao = "host=ec2-54-243-124-240.compute-1.amazonaws.com port=5432 dbname=dcfr83fuj95lm7 user=rweuqlrlblxtap password=f1887ebdce0aec7840c48b0d84c4f037944425fdbb976c8d91601d922c8795c3";
                    $conexao = @pg_connect($sconexao);
                    $resultado = @pg_query($conexao, "INSERT INTO USUARIO(LOGIN,SENHA) VALUES ('$login','$senha');");
                    $numero_linhas = @pg_affected_rows($resultado);
                    if($numero_linhas != 0){
                        echo "<h3 style='color:green; margin-left:10px'>Usuário cadastrado com sucesso.";
                        include_once 'login.html';
                    }
                    else{
                        echo 'ops';
                        include_once 'index.html';
                    }
                }
    }
?>