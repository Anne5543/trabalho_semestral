<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_agendamento'], $_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['data'], $_POST['hora'], $_POST['especie'], $_POST['servico'])) {
        
        require '../verify/conexao.php';
        
        $id_agendamento = $_POST['id_agendamento'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        $especie = $_POST['especie'];
        $id_servico = $_POST['servico'];

        $sql_atualizar = "UPDATE agendamentos SET nome = :nome, email = :email, telefone = :telefone, data = :data, hora = :hora, especie = :especie, id_servico = :id_servico WHERE id = :id_agendamento";

        try {
            $stmt_atualizar = $conexao->prepare($sql_atualizar);
            $stmt_atualizar->bindParam(':nome', $nome);
            $stmt_atualizar->bindParam(':email', $email);
            $stmt_atualizar->bindParam(':telefone', $telefone);
            $stmt_atualizar->bindParam(':data', $data);
            $stmt_atualizar->bindParam(':hora', $hora);
            $stmt_atualizar->bindParam(':especie', $especie);
            $stmt_atualizar->bindParam(':id_servico', $id_servico);
            $stmt_atualizar->bindParam(':id_agendamento', $id_agendamento);
            $stmt_atualizar->execute();

            if ($stmt_atualizar->rowCount() > 0) {
                header("Location: ../tela_admin/agendamentos.php");
                exit();
                echo "alert('Alterações salvas com sucesso!');";
            } else {
                echo "<script>alert('Nenhuma linha foi atualizada.');</script>";
            }
        } catch (PDOException $e) {
            echo "Erro na atualização: " . $e->getMessage();
        }
    }
}
?>
