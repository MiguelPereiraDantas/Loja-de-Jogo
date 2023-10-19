<?php
    
    session_start();
    
    unset($_SESSION['id'], $_SESSION['email'], $_SESSION['nivel']);
    
    $_SESSION['msg'] = '<script>alert("Você foi deslogado com sucesso.")</script>';
    
    header("Location:index.php");