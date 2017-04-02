<?php
    if($_POST){
           session_start();
           if(isset($_SESSION['usuario'])){
                if(isset($_POST['nome']) && isset($_POST['qtd'])){
                    $titulo = $_POST['nome'];
                    $qtd_disponivel = $_POST['qtd'];
                    $sconexao = "host=ec2-54-243-124-240.compute-1.amazonaws.com port=5432 dbname=dcfr83fuj95lm7 user=rweuqlrlblxtap password=f1887ebdce0aec7840c48b0d84c4f037944425fdbb976c8d91601d922c8795c3";
                    $conexao = @pg_connect($sconexao);
                    $resultado = @pg_query($conexao, "INSERT INTO LIVRO(NOME,QUANTIDADE_DISPONIVEL) VALUES ('$titulo','$qtd_disponivel');");
                    $numero_linhas = @pg_affected_rows($resultado);
                    if($numero_linhas != 0){
                        echo "<h3 style='color:green; margin-left:10px'>Titulo cadastrado com sucesso.</h3>";
                        include_once 'index.php';
                    }
                    else{
                        echo 'ops';
                        include_once 'index.php';
                    }
                }
            }
    }
?>
