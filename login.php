<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PTQX Games</title>
    </head>
    <body>
        <h1 align = "center" >Área de Login</h1>
        <hr>
        <?php 
            if(isset($_SESSION['msgErro'])){
                echo $_SESSION['msgErro'];
                unset($_SESSION['msgErro']);
            }
        
        ?>
        <form method="POST" action="funcoes.php">
            <table>
                <tbody>
                    <tr>
                        <td>E-Mail</td>
                        <td><input type="text" name="inpEmail"></td>
                    </tr>
                    <tr>
                        <td>Senha</td>
                        <td><input type="password" name="inpSenha"/></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="acao" value="login"></td>
                        <td><input type = "submit" value="Logar"></td>
                    </tr>
                </tbody>
            </table>
        </form>
        Não possui uma conta? <a href="cadastro.php">Crie grátis</a>
    </body>
</html>