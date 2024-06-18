<?php 
session_start();

    if (isset($_POST["login"]) && !empty($_POST["login"]) && isset($_POST["senha"]) && !empty($_POST["senha"])) {
        require '../verify/conexao.php';
        
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
        $resultado = $conexao->prepare($sql);
        $resultado->bindValue(":login", $login);
        $resultado->bindValue(":senha", $senha);
        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $dado = $resultado->fetch();

            $_SESSION['id'] = $dado['id'];
            $_SESSION['login'] = $dado['login'];
            $_SESSION['usuario'] = $dado['usuario'];
            $_SESSION['tipo_usuario'] = $dado['tipo_usuario'];


            if ($dado['tipo_usuario'] == 1) {
                header('Location: ../tela_admin/inicio_admin.php');
            } elseif ($dado['tipo_usuario'] == 0) {
                header('Location: ../inicio.php');
            }
            die(); 

            header('Location: ../inicio.php');
        } else {
            header('Location: ../login/index.php?error=1');
        }
    }


