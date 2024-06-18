<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contato_id'])) {
    require '../verify/conexao.php';
    
    $contatoId = $_POST['contato_id'];
    
    $resultado = $conexao->prepare("DELETE FROM contatos WHERE id = ?");
    if ($resultado->execute([$contatoId])) {
        header("Location: ../tela_admin/comentarios.php");
        exit();
    } else {
        echo "Erro ao excluir contato.";
    }
} else {
    header("Location: ./tela_admin/comentarios.php");
    exit();
}
?>
