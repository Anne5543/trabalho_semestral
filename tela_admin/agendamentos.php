<?php
session_start();
if (!isset($_SESSION["id"])) {
    header('location: ../login/index.php');
};
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            font-family: 'Nunito', sans-serif;
            display: flex;
            flex-direction: column;
        }

        .header {
            width: 100%;
            height: 80px;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: #7c137b;
            z-index: 100;
        }

        .nomeUsuario {
            margin-right: 10px;
            color: white;
        }

        .header_toggle {
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .profile_container {
            display: flex;
            align-items: center;
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: #7c137b;
            padding: 0.5rem 1rem;
            transition: 0.3s;
            z-index: 99;
        }

        .nav {
            background-color: #7c137b;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 2rem 0;
        }

        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: 0.5rem 1.5rem;
        }

        .nav_link {
            color: #c2c7d0;
            margin-bottom: 1.5rem;
            transition: 0.3s;
        }

        .nav_link:hover {
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 1rem;
            padding-top: 100px;
            transition: 0.3s;
            width: calc(100% - 250px);
            flex: 1;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                width: 100%;
                padding-top: 80px;
            }

            .l-navbar {
                width: 50%;
                left: -100%;
            }

            .l-navbar.show {
                left: 0;
            }
        }

        .footer-table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 250px;
            padding: 1rem;
            width: calc(100% - 250px);
            flex-direction: column;
        }

        @media (max-width: 768px) {
            .footer-table-container {
                margin-left: 0;
                width: 100%;
            }
        }

        .table-container {
            border: 1px solid #dee2e6;
            padding: 1rem;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 100%;
            overflow-x: auto;
        }

        .table thead th {
            background-color: #f8f9fa;
        }

        .table th,
        .table td {
            white-space: nowrap;
            padding: 0.75rem;
        }

        .table thead th,
        .table tbody td {
            width: auto;
        }

        .table-container .btn {
            margin: 0 0.2rem;
        }

        .table-container .btn-danger {
            margin-left: 0;
        }
    </style>
</head>

<body>
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bi bi-list' id="header-toggle"></i>
            <img src="../images/logo.png" id="logo" alt="logo" class="nav-logo" style="height: 60px; width:160px;">
        </div>
        <div class="profile_container">
            <img src="../images/perfil.png" alt="perfil" id="perfil" width="90" height="55">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="nomeUsuario"><?php echo $_SESSION['usuario']; ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a id="logout" class="dropdown-item" href="../verify/logout.php">Sair da conta</a></li>
            </ul>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div style="margin-top: 65px;">
                <div class="nav_list">
                    <a href="inicio_admin.php" class="nav_link active">
                        <span class="nav_name">Início</span>
                    </a>
                    <a href="usuarios.php" class="nav_link">
                        <span class="nav_name">Clientes</span>
                    </a>
                    <a href="agendamentos.php" class="nav_link">
                        <span class="nav_name">Agendamentos</span>
                    </a>
                    <a href="comentarios.php" class="nav_link">
                        <span class="nav_name">Contatos</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const toggle = document.getElementById('header-toggle');
            const nav = document.getElementById('nav-bar');
            const bodypd = document.querySelector('body');
            const headerpd = document.getElementById('header');

            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    nav.classList.toggle('show');
                    bodypd.classList.toggle('body-pd');
                    headerpd.classList.toggle('body-pd');
                });
            }
        });
    </script>

    <?php
    error_reporting(0);
    ini_set('display_errors', 0);

    require "../crudAgendamento/listar_agendamento.php";
    ?><div style="padding-top: 160px;">
        <div class="footer-table-container">
            <h4>O total de Agendamentos: <?php echo isset($_SESSION['num_linhas']) ? $_SESSION['num_linhas'] : 0; ?></h4><br>
            <div class="table-container table-responsive-sm">
                <?php
                if (isset($agendamentos) && count($agendamentos) > 0) {
                ?>
                    <h3 style="text-align: center">Agendamentos</h3><br>
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Data</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Serviço</th>
                                <th scope="col">Espécie</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($agendamentos as $agendamento) {
                                echo "<tr>";
                                echo "<td>" . $agendamento['id'] . "</td>";
                                echo "<td>" . $agendamento['nome'] . "</td>";
                                echo "<td>" . $agendamento['email'] . "</td>";
                                echo "<td>" . $agendamento['telefone'] . "</td>";
                                echo "<td>" . $agendamento['data'] . "</td>";
                                echo "<td>" . $agendamento['hora'] . "</td>";
                                echo "<td>" . $agendamento['servico_nome']  . "</td>";
                                echo "<td>" . $agendamento['especie'] . "</td>";
                                echo "<td>
                                    <a href='./editar_agenda.php?id=" . $agendamento['id'] . "'>
                                    <button class='btn btn-warning'>Editar</button></a>
                                    <form method='post' action='../crudAgendamento/excluir_agenda.php' style='display: inline;'>
                                        <input type='hidden' name='agendamento_id' value='" . $agendamento['id'] . "'>
                                        <button type='submit' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir este contato?\")'>Excluir</button>
                                    </form>
                                </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                }else {
                    echo "<h3 style='text-align:center;'> Você não tem nenhum nenhum agendamento.</h3>";
                }
                ?>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>