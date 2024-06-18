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
            transition: 0.3s;
        }

        .nomeUsuario {
            margin-right: 10px;
            color: white;
            font-family: 'Nunito', sans-serif;
        }

        .header_toggle {
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
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
            padding: 0.5rem 1rem 0;
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
            position: relative;
            color: #c2c7d0;
            margin-bottom: 1.5rem;
            transition: 0.3s;
        }

        .nav_link:hover {
            color: white;
        }

        .nav_icon {
            font-size: 1.25rem;
        }

        .show {
            left: 0;
        }

        .active {
            color: white;
        }

        .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: white;
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

        table td,
        .table th {
            padding: 0.5rem;
            font-size: 0.9rem; 
        }

        @media (max-width: 768px) {
            .table-responsive-sm {
                overflow-x: auto; 
            }

            .table td,
            .table th {
                padding: 0.3rem; 
            }
        }

        .footer-table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            transition: 0.3s;
            width: 100%;
            flex-direction: column;
        }

        @media (max-width: 768px) {
            .footer-table-container {
                width: 100%;
                height: auto;
            }

            .table-container {
                overflow-x: auto;
            }
        }

        .table-container {
            border: 1px solid #dee2e6;
            padding: 1rem;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 900px;
        }

        .table {
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table th,
        .table td {
            width: 20%;
            padding: 0.5rem;
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
                    <a href="#" class="nav_link active">
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

    <div class="container mt-5 main-content">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Todos os Usuarios cadastrados.</p>
                        <a href="usuarios.php" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Agendamento de serviços</h5>
                        <p class="card-text">Todos os agendamentos.</p>
                        <a href="agendamentos.php" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Contatos</h5>
                        <p class="card-text">Todos os Comentários.</p>
                        <a href="comentarios.php" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>

        <div class="footer-table-container" >
            <div class="table-container table-responsive-sm">
                <h3 style="text-align: center;">Top 3 serviços mais procurados</h3><br>
                <table class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Serviço</th>
                            <th scope="col">Total de Agendamentos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../verify/conexao.php';
                        $sql_top3 = "SELECT s.id, s.nome AS servicos, COUNT(a.id_servico) AS total_agendamentos 
                                     FROM agendamentos AS a
                                     JOIN servicos AS s ON a.id_servico = s.id
                                     GROUP BY s.id, s.nome
                                     ORDER BY total_agendamentos DESC
                                     LIMIT 3";
                        $resultado_top3 = $conexao->query($sql_top3);
                        while ($row = $resultado_top3->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['servicos'] . "</td>";
                            echo "<td>" . $row['total_agendamentos'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

