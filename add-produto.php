<?php 
    //UPLOAD DA IMAGEM
    include 'conexao.php';
    
    $btnCad = filter_input(INPUT_POST, 'btnEnviar');
    
    if($btnCad){
        if(isset($_FILES['arquivo'])){
        
            $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
            $novo_nome = md5(time()).$extensao;
            $diretorio = "images/capas/";
            
            $nome = $_POST['inpNome'];
            $preco = $_POST['inpPreco'];
            $qtd = $_POST['inpQtd'];
            
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
            
            $sql = "INSERT INTO tb_produto(nome_produto, preco_produto, qtd_estoque_produto, img_produto)VALUES('".$nome."','".$preco."','".$qtd."','".$novo_nome."')";
            $query = mysqli_query($conexao, $sql);
            if(mysqli_insert_id($conexao)){
                echo '<script>alert("Produto adicionado com sucesso.")</script>';
            }else{
                //echo '<script>alert("Falha ao adicionar o produto.")</script>';
                echo mysqli_error($conexao).'<br>';
                echo $novo_nome.'<br>';
                echo $nome.'<br>';
                echo $preco.'<br>';
                echo $qtd;
            }
        }
    }




?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PTQX Games</title>
        <style>
            #div-tabela{
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <?php
            include './templates/menu-admin.php';
        ?>
        <div id="div-tabela">
            <form method="POST" action="adicionar-produto.php" enctype="multipart/form-data">
                <table>
                    <tbody>
                        <tr>
                            <td>Nome</td>
                            <td><input type = 'text' name="inpNome"></td>
                        </tr>
                        <tr>
                            <td>Preço</td>
                            <td><input type = 'text' name="inpPreco"></td>
                        </tr>
                        <tr>
                            <td>Quantidade</td>
                            <td><input type = 'text' name="inpQtd"></td>
                        </tr>
                        <tr>
                            <td>Capa</td>
                            <td><input type = "file" required name="arquivo"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type = 'submit' name="btnEnviar" value="Cadastrar"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>