<!DOCTYPE html>
<!-- MENU SE O USUÁRIO ESTIVER LOGADO -->
<style>
    *{
        margin: 0px;
        padding: 0px;
    }
    .menu ul li{
        background-color: #6da3f9;
        color: white;
        float: left;
        width: 200px;
        height: 40px;
        display: inline-block;
        text-align: center;
        line-height: 40px;
        font-size: 20px;
    }
    ul li a{
        text-decoration: none;
        color: white;
    }
    .menu ul li:hover{
        background-color: #2c69cc;
    }
    #div-menu{
        width: 100%;
        height: 40px;
        background-color: #6da3f9;
    }
</style>
<body>
    <div id="div-menu">
        <nav class = "menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Ver Clientes</a></li>
                <li><a href="#">Ver Funcionarios</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="sair.php">Deslogar</a></li>
            </ul>
        </nav>
    </div>
</body>