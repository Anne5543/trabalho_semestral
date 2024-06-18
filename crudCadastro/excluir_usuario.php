<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario_id'])) {
    require '../verify/conexao.php';
    
    $usuarioId = $_POST['usuario_id'];
    
    $resultado = $conexao->prepare("DELETE FROM usuario WHERE id = ?");
    if ($resultado->execute([$usuarioId])) {
        header("Location: ../tela_admin/usuarios.php");
        exit();
    } else {
        echo "Erro ao excluir contato.";
    }
} else {
    header("Location: ../tela_admin/usuarios.php");
    exit();
}
?> 

