<?php

session_start();

if (isset($_POST['acao'])) {
    if ($_POST['acao'] == 'login') {
        verificarLogin();
    }
}

function verificarLogin() {
    include 'conexao.php';

    $email = filter_input(INPUT_POST, 'inpEmail', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'inpSenha', FILTER_SANITIZE_STRING);

    $sql_comum = "SELECT * FROM tb_cliente WHERE email_cliente = '$email' LIMIT 1";
    $sql_adm = "SELECT * FROM tb_admin WHERE email_admin = '$email' LIMIT 1";

    $result_comum = mysqli_query($conexao, $sql_comum);
    $result_adm = mysqli_query($conexao, $sql_adm);

    $numRowsComum = $result_comum->num_rows;
    $numRowsAdm = $result_adm->num_rows;

    if ($numRowsComum != 0) {
        $row_usuario = mysqli_fetch_array($result_comum);
        if (password_verify($senha, $row_usuario['senha'])) {
            $_SESSION['id'] = $row_usuario['id_cliente'];
            $_SESSION['email'] = $row_usuario['email_cliente'];
            $_SESSION['nivel'] = $row_usuario['nivel'];
            header("Location:index.php");
        }
    } elseif ($numRowsAdm != 0) {
        $row_usuario = mysqli_fetch_array($result_adm);
        if (password_verify($senha, $row_usuario['senha_admin'])) {
            $_SESSION['id'] = $row_usuario['id_admin'];
            $_SESSION['email'] = $row_usuario['email_admin'];
            $_SESSION['nivel'] = $row_usuario['nivel'];
            header("Location:index.php");
        } else {
            $_SESSION['msgErro'] = '<script>alert("E-Mail ou Senha incorretos.")</script>';
            header("Location:login.php");
        }
    }
}