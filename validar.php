<?php
    session_start();
    if(!isset($_SESSION["login"])){
        session_destroy();
        $msg = "Usuário sem acesso!";
        header("Location:login.php?erro=".$msg);
    }
?>