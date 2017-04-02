 <?php
        if($_POST){
           if(isset($_POST['login']) && isset($_POST['senha'])){
               $login = $_POST['login'];
               $senha = $_POST['senha'];
               $sconexao = "host=localhost port=5432 dbname=biblioteca user=postgres password=123456";
               $conexao = @pg_connect($sconexao);
               $resultado = @pg_query($conexao, "SELECT * FROM USUARIO");
               $numero_linhas = @pg_affected_rows($resultado);
               if($numero_linhas != 0){
                    while($linha = pg_fetch_array($resultado,null,PGSQL_ASSOC)){
                        if($linha['login'] == $login && $linha['senha'] == $senha){
                            session_start();
                            $_SESSION['usuario'] = $linha['login'] = $linha['login'];
                            include_once 'index.php';
                            break;
                        }
                    } 
                }
                if(!isset ($_SESSION['usuario'])){
                    echo "Usuário ou senha incorreta";
                    include_once 'login.html';
                }
                
            }
            else{
                echo 'Cadastre-se primeiro.';
                include_once 'login.html';
            }
        }
?>
