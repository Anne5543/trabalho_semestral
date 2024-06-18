<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require '../verify/conexao.php';
    $senhaAtual = $_POST['senhaAtual'];
    $novaSenha = $_POST['novaSenha'];
    $confirmarSenha = $_POST['confirmarSenha'];

    if ($novaSenha !== $confirmarSenha) {
        echo "<script>
                alert('A nova senha e a confirmação não coincidem.');
                window.location.href = '../inicio.php';
            </script>";
        die();
    }

    $sql = "SELECT senha FROM usuario WHERE id = :idUsuario";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':idUsuario' => $_SESSION['id']]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($senhaAtual !== $usuario['senha']) {
        echo "<script>
                alert('A senha atual está incorreta.');
                window.location.href = '../inicio.php';
            </script>";
        die();
    }

    $sql = "UPDATE usuario SET senha = :novaSenha WHERE id = :idUsuario AND senha = :senhaAtual";
    $stmt = $conexao->prepare($sql);

    try {
        $stmt->execute([
            ':novaSenha' => $novaSenha,
            ':idUsuario' => $_SESSION['id'],
            ':senhaAtual' => $senhaAtual
        ]);

        if ($stmt->rowCount() > 0) {
            echo "<script>
                    alert('Senha atualizada com sucesso!');
                    window.location.href = '../inicio.php';
                </script>";
        }
    } catch (PDOException $e) {
        echo "<script>
        alert('Erro ao redefinir senha');
        window.location.href = '../inicio.php';
        </script>" . $e->getMessage();
    }
}
