<?php 
require '../verify/conexao.php';
session_start();

    $sql = "SELECT agendamentos.id, agendamentos.nome, agendamentos.email, agendamentos.telefone, agendamentos.data, agendamentos.hora, servicos.nome AS servico_nome, agendamentos.especie
    FROM agendamentos
    JOIN servicos ON agendamentos.id_servico = servicos.id";
    $resultado = $conexao->prepare($sql);
    $resultado->execute();

    $agendamentos = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['num_linhas'] = count($agendamentos);

  






