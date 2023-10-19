<?php 
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PTQX GAMES</title>
        <link rel="stylesheet" type="text/css" href="css/style-index.css">
    </head>
    <body>
        <?php
            //DEFININDO O MENU;
            if(isset($_SESSION['id'])){
                if($_SESSION['nivel'] == 'comum'){
                    include 'templates/menu-user-logado.php'; 
                }elseif($_SESSION['nivel'] == 'admin'){
                    include 'templates/menu-admin.php'; 
                }
            }else{
                include 'templates/menu-inicio.php'; 
            }
            
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <div id="div-tabela">
            <?php
            include 'conexao.php';
            $sql = "SELECT * FROM tb_produto";
            $result_set = mysqli_query($conexao, $sql);

            echo "<table border = '1' id = 'mytable'><tr>";
            $i = 0;
            
            while ($row = mysqli_fetch_array($result_set)) {
                echo '<th>' . $row['nome_produto'] . '<br><br>';
                echo '<img src = "images/capas/' . $row['img_produto'] . '" width = 160px height = 200px><br><br>';
                echo 'R$ ' . number_format($row['preco_produto'], '2', ',', '.') . '<br><br>';
                echo "<a href = 'carrinho.php?acao=add&id=".$row['id_produto']."'>Adicionar ao carrinho</a>";
                $i++;
                if ($i == 5) {
                    echo "</tr><tr>";
                    $i = 0;
                }
            }
            echo "</tr></table>";
            ?>
        </div>
    </body>
</html>