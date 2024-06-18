<?php
require "../verify/conexao.php";

$sql = "SELECT * FROM usuario";
$resultado = $conexao->prepare($sql);
$resultado->execute();
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

$num_linhas = $resultado->rowCount();

session_start();
$_SESSION['num_linhas'] = $num_linhas;