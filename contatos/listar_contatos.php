<?php
require "../verify/conexao.php";

$sql = "SELECT * FROM contatos";
$resultado = $conexao->prepare($sql);
$resultado->execute();
$contatos = $resultado->fetchAll(PDO::FETCH_ASSOC);

$num_linhas = $resultado->rowCount();

session_start();
$_SESSION['num_linhas'] = $num_linhas;