<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agendamento_id'])) {
    require '../verify/conexao.php';
    
    $agendamentoId = $_POST['agendamento_id'];
    
    $resultado = $conexao->prepare("DELETE FROM agendamentos WHERE id = ?");
    if ($resultado->execute([$agendamentoId])) {
        header("Location: ../tela_admin/agendamentos.php");
        exit();
    } else {
        echo "Erro ao excluir contato.";
    }
} else {
    header("Location: ../tela_admin/agendamentos.php");
    exit();
}
?>