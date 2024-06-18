<?php
session_start();

    if (isset($_POST["nome"]) && !empty($_POST["nome"]) && isset($_POST["telefone"]) && !empty($_POST["telefone"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["comentario"]) && !empty($_POST["comentario"])) {
        require '../verify/conexao.php';

        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $comentario = $_POST["comentario"];


            $sql = "INSERT INTO contatos (nome, telefone, email, comentario) VALUES (:nome, :telefone, :email, :comentario)";
            $resultado = $conexao->prepare($sql);
            $resultado->bindValue(":nome", $nome);
            $resultado->bindValue(":telefone", $telefone);
            $resultado->bindValue(":email", $email);
            $resultado->bindValue(":comentario", $comentario);
            $resultado->execute();

            echo "<script>
                alert('Seu comentário foi enviado com sucesso.');
                window.location.href = '../inicio.php';
                </script>";
            exit();

        }else {
        echo "<script>
                    alert('Preencha todos os campos.');
                    window.location.href = '../login/index.php';
            </script>";
        }
    
