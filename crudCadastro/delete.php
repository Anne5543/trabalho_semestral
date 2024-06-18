<?php
session_start();

if (isset($_SESSION['id'])) {
    require '../verify/conexao.php';

    $id_usuario = $_SESSION['id'];

    $deletar_sql = "DELETE FROM usuario WHERE id = :id";
    $delete = $conexao->prepare($deletar_sql);
    $delete->bindValue(':id', $id_usuario);
    $delete->execute();

    session_destroy();

    header('Location: ../login/index.php');
    exit();
} else {
    header('Location: ../inicio.php');
    exit();
}
