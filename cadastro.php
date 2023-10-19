<?php 
    session_start();
    $nome = "";
    $snome = "";
    $cpf = "";
    $cep = "";
    $tel = "";
    $email = "";
    
    //Botão de cadastro;
    $btnCad = filter_input(INPUT_POST, 'btnCad'); 
    
    if($btnCad){
       include 'conexao.php';
       $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
       $erro = false;
       
        //Tratamento das Strings;
       
       $dados_st = array_map('strip_tags',$dados_rc); //Remove tags digitadas;
       $dados = array_map('trim',$dados_st); //Remove espaços;
       
       if(in_array('',$dados)){
           $erro = true;
           $_SESSION['msgErro'] = "Necessário preencher todos os campos";
           
       }elseif(strlen($dados['inpSenha']) < 6){
           $erro = true;
           $_SESSION['msgErro'] = "A senha deve ter no minímo 6 caracteres";
            $nome = $_POST['inpNome'];
            $snome = $_POST['inpSobre'];
            $cpf = $_POST['inpCpf'];
            $cep = $_POST['inpCep'];
            $tel = $_POST['inpTel'];
            $email = $_POST['inpEmail'];
           
       }elseif($dados['inpSenha'] <> $dados['inpConf']){
           $erro = true;
           $_SESSION['msgErro'] = "As senhas devem ser iguais";
           $nome = $_POST['inpNome'];
           $snome = $_POST['inpSobre'];
           $cpf = $_POST['inpCpf'];
           $cep = $_POST['inpCep'];
           $tel = $_POST['inpTel'];
           $email = $_POST['inpEmail'];
           
       }elseif(stristr($dados['inpSenha'], "'" || stristr($dados['inpConf'], "'"))){
           $erro = true;
           $_SESSION['msgErro'] = "Caractere( ' ) utilizado na senha é inválido";
           
       }else{
           $sql = "SELECT id_cliente FROM tb_cliente WHERE email_cliente = '".$dados['inpEmail']."'";
           $query = mysqli_query($conexao, $sql);
           if($query && ($query-> num_rows != 0)){
               $erro = true;
               $_SESSION['msgErro'] = "Esse E-Mail já está cadastrado";
           }
       }
       
       if(!$erro){
           
           $dados['inpSenha'] = password_hash($dados['inpSenha'], PASSWORD_DEFAULT);
           $sql = "INSERT INTO tb_cliente(prim_nome_cliente,sobre_nome_cliente,cep_cliente,"
                   . "telefone_cliente,email_cliente,cpf_cliente,senha) VALUES( 
                    '".$dados['inpNome']."',
                    '".$dados['inpSobre']."',
                    '".$dados['inpCep']."',
                    '".$dados['inpTel']."',
                    '".$dados['inpEmail']."',
                    '".$dados['inpCpf']."',
                    '".$dados['inpSenha']."'
                  )";
           $query = mysqli_query($conexao, $sql);
           
           if(mysqli_insert_id($conexao)){
               $_SESSION['msgErro'] = "Cadastro realizado com sucesso";
           }else{
               $_SESSION['msgErro'] = "Erro ao tentar realizar o cadastro";
           }
        }
    }


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PTQX Games</title>
    </head>
    <body>
        <h1 align="center">Cadastre-se na PTQX Games e compre nossos produtos</h1>
        <hr>
        <p></p>
        <?php 
           if(isset($_SESSION['msgErro'])){
               echo "<b>".$_SESSION['msgErro']."</b>";
               unset($_SESSION['msgErro']);
           }
        ?>
        <p></p>
        <form method="POST" action="cadastro.php">
            <table>
                <tbody>
                    <tr>
                        <td>Nome</td>
                        <td><input type="text" name="inpNome" placeholder="Digite seu primeiro nome" value = "<?php echo $nome; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Sobrenome</td>
                        <td><input type="text" name="inpSobre" placeholder="Digite seu sobrenome" value = "<?php echo $snome; ?>"></td>
                    </tr>
                    <tr>
                        <td>CPF</td>
                        <td><input type="text" name="inpCpf" placeholder="Digite apenas números" value = "<?php echo $tel; ?>"></td>
                    </tr>
                    <tr>
                        <td>CEP</td>
                        <td><input type="text" name="inpCep" placeholder="Digite apenas números" value = "<?php echo $cep; ?>"></td>
                    </tr>
                    <tr>
                        <td>Telefone</td>
                        <td><input type="text" name="inpTel" placeholder="Digite apenas números" value = "<?php echo $tel; ?>"></td>
                    </tr>
                    <tr>
                        <td>E-Mail</td>
                        <td><input type="text" name="inpEmail" placeholder="Você usará o e-mail para realizar login" size="30" value = "<?php echo $email; ?>"></td>
                    </tr>
                    <tr>
                        <td>Senha</td>
                        <td><input type="password" name="inpSenha" placeholder="Digite sua senha"></td>
                    </tr>
                    <tr>
                        <td>Confirmação da senha</td>
                        <td><input type="password" name="inpConf" placeholder="Confirme sua senha"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="btnCad" value="Cadastar"></td>
                    </tr>
                </tbody>
            </table>
        </form>
        Já possui uma conta?<a href="login.php">Realize seu login</a>
    </body>
</html>