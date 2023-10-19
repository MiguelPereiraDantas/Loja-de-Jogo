<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['nivel'])) {
    if ($_SESSION['nivel'] == 'comum') {
        ?>
        <?php
        if (isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] == array();
        }

        if (isset($_GET['acao'])) {

            if ($_GET['acao'] == 'add') {
                $id = intval($_GET['id']);
                if (!isset($_SESSION['carrinho'][$id])) {
                    $_SESSION['carrinho'][$id] = 1;
                } else {
                    $_SESSION['carrinho'][$id] += 1;
                }
            }

            if ($_GET['acao'] == 'del') {
                $id = intval($_GET['id']);
                if ($_SESSION['carrinho'][$id]) {
                    unset($_SESSION['carrinho'][$id]);
                }
            }

            if ($_GET['acao'] == 'up') {
                if (is_array($_POST['prod'])) {
                    foreach ($_POST['prod'] as $id => $qtd) {
                        $id = intval($id);
                        $qtd = intval($qtd);

                        if (!empty($qtd) || $qtd <> 0) {
                            $_SESSION['carrinho'][$id] = $qtd;
                        } else {
                            unset($_SESSION['carrinho'][$id]);
                        }
                    }
                }
            }
        }
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>PTQX Games</title>
                <link rel="stylesheet" type="text/css" href="css/style-carrinho.css">
            </head>
            <body>
                <div>
                <table id="mytable">
                    <caption>Seu Carrinho</caption>
                    <thead>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>SubTotal</th>
                    <th>Remover</th>
                </thead>


                <form action="?acao=up" method="POST">
                    <tfoot>
                        <tr>
                            <td colspan="5"><input type="submit" value="Atualizar Carrinho"></td>
                        </tr>

                        <tr>
                            <td><a href="index.php">Adicionar mais produtos</a></td>
                        </tr>
                    </tfoot>

                    <tbody>
        <?php
        include 'conexao.php';
        if (count($_SESSION['carrinho']) == 0) {
            echo "<tr><td colspan = 5 align = cneter>Nenhum produto no carrinho</td></tr>";
        } else {
            $total = 0;
            foreach ($_SESSION['carrinho'] as $id => $qtd) {
                $sql = "SELECT * FROM tb_produto WHERE id_produto = '{$id}'";
                $result_set = mysqli_query($conexao, $sql);
                $row = mysqli_fetch_array($result_set);

                $nome = $row['nome_produto'];
                $preco = number_format($row['preco_produto'], '2', ',', '.');
                $calcSub = $row['preco_produto'] * $qtd;
                $sub = number_format($calcSub, '2', ',', '.');

                $total += $sub;
                echo '<tr>';
                echo '<td>' . $nome . '</td>';
                echo '<td>R$ ' . $preco . '</td>';
                echo '<td><input type = number value = ' . $qtd . ' name = "prod[' . $id . ']"></td>';
                echo '<td>R$ ' . $sub . '</td>';
                echo '<td><a href = "carrinho.php?acao=del&id=' . $id . '">Remove</a></td>';
                echo '</tr>';
            }
            $total = number_format($total, '2', ',', '.');
            echo '<tr><th colspan = 5>Total: R$ ' . $total . '</th></tr>';
        }
        ?>
                    </tbody>
                </form>
            </table>
        
        </body>
        </html>
        <?php
    } else {
        header("Location:index.php");
    }
} else {
    $_SESSION['msg'] = "<script>alert('Porfavor, faça login para poder realizar a compra')</script>";
    header("Location:index.php");
}
?>