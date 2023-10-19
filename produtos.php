<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PTQX Games</title>
        <link rel="stylesheet" type="text/css" href="css/style-tabela.css">
    </head>
    <body>
        <?php
        include 'templates/menu-admin.php';
        ?>
        <div id="div-mytable">
            <table id="mytable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade em estoque</th>
                        <th>Remover</th>
                        <th>Alterar</th>
                    </tr>
                </thead>

                <tbody>
                    
                        <?php
                            include 'conexao.php';
                            $sql = "SELECT * FROM tb_produto";
                            $query = mysqli_query($conexao, $sql);

                            while($row = mysqli_fetch_array($query)){
                                echo '<tr><td>'.$row['id_produto'].'</td>';
                                echo '<td>'.$row['nome_produto'].'</td>';
                                echo '<td>R$ '. number_format($row['preco_produto'], '2', ',', '.').'</td>';
                                echo '<td>'.$row['qtd_estoque_produto'].'</td>';
                                echo '<td><a href = "remover.php">Remove</a></td>';
                                echo '<td><a href = "alterar.php">Altera</a></td>';
                            }
                        ?>
                    
                </tbody>
                
                <tfoot>
                    <tr>
                        <th colspan="6"><a href="adicionar-produto.php">Adicionar novo produto</a></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
</html>