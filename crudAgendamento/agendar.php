<?php
session_start();

if (isset($_POST["nome"]) && !empty($_POST["nome"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["telefone"]) && !empty($_POST["telefone"]) && isset($_POST["data"]) && !empty($_POST["data"]) && isset($_POST["hora"]) && !empty($_POST["hora"]) && isset($_POST["servico"]) && !empty($_POST["servico"]) && isset($_POST["especie"]) && !empty($_POST["especie"])) {
    
    require '../verify/conexao.php';

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $servico = $_POST["servico"];
    $especie = $_POST["especie"];

    try {

        $sql_inserir = "INSERT INTO agendamentos (nome, email, telefone, data, hora, id_servico, especie) VALUES (:nome, :email, :telefone, :data, :hora, :servico, :especie)";
        $stmt_inserir = $conexao->prepare($sql_inserir);
        $stmt_inserir->bindValue(":nome", $nome);
        $stmt_inserir->bindValue(":email", $email);
        $stmt_inserir->bindValue(":telefone", $telefone);
        $stmt_inserir->bindValue(":data", $data);
        $stmt_inserir->bindValue(":hora", $hora);
        $stmt_inserir->bindValue(":servico", $servico);
        $stmt_inserir->bindValue(":especie", $especie);
        $stmt_inserir->execute();

        $sql_recuperar = "SELECT 
                            a.id AS id_agendamento,
                            a.nome AS nome_cliente,
                            a.email,
                            a.telefone,
                            a.data AS data_agendamento,
                            a.hora AS hora_agendamento,
                            s.nome AS nome_servico,
                            a.especie
                        FROM 
                            agendamentos a
                        JOIN 
                            servicos s ON a.id_servico = s.id
                        WHERE 
                            a.nome = :nome AND
                            a.email = :email AND
                            a.telefone = :telefone AND
                            a.data = :data AND
                            a.hora = :hora AND
                            a.id_servico = :servico AND
                            a.especie = :especie
                        ORDER BY 
                            a.id DESC
                        LIMIT 1";

        $stmt_recuperar = $conexao->prepare($sql_recuperar);
        $stmt_recuperar->bindValue(":nome", $nome);
        $stmt_recuperar->bindValue(":email", $email);
        $stmt_recuperar->bindValue(":telefone", $telefone);
        $stmt_recuperar->bindValue(":data", $data);
        $stmt_recuperar->bindValue(":hora", $hora);
        $stmt_recuperar->bindValue(":servico", $servico);
        $stmt_recuperar->bindValue(":especie", $especie);
        $stmt_recuperar->execute();
        $resultado = $stmt_recuperar->fetch(PDO::FETCH_ASSOC);

        echo "<script>
                alert('Seu Agendamento foi registrado com sucesso.');
                window.location.href = '../inicio.php';
                </script>";
            exit();

    } catch (PDOException $e) {
        echo "Erro ao executar a consulta: " . $e->getMessage();
   
    }
}