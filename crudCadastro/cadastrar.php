<?php
session_start();

    if (isset($_POST["usuario"]) && !empty($_POST["usuario"]) && isset($_POST["login"]) && !empty($_POST["login"]) && isset($_POST["senha"]) && !empty($_POST["senha"])) {
        require '../verify/conexao.php';

        $usuario = $_POST["usuario"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        $check_sql = "SELECT COUNT(*) AS total FROM usuario WHERE login = :login";
        $check_resultado = $conexao->prepare($check_sql);
        $check_resultado->bindValue(":login", $login);
        $check_resultado->execute();
        $row = $check_resultado->fetch(PDO::FETCH_ASSOC);

        if ($row['total'] > 0) {
            echo "<script>
                    alert('Este e-mail já está cadastrado.');
                    window.location.href = '../login/index.php';
                </script>";
        } else {
            $sql = "INSERT INTO usuario (usuario, login, senha) VALUES (:usuario, :login, :senha)";
            $resultado = $conexao->prepare($sql);
            $resultado->bindValue(":login", $login);
            $resultado->bindValue(":senha", $senha);
            $resultado->bindValue(":usuario", $usuario);
            $resultado->execute();

            $userId = $conexao->lastInsertId();

            $_SESSION['id'] = $userId;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['login'] = $login;

            header('Location: ../arquivo.php?success=ok');
            exit();
        }
    } else {
        echo "<script>
                    alert('Preencha todos os campos.');
                    window.location.href = '../login/index.php';
            </script>";
    }

