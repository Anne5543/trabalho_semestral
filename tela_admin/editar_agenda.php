<?php
session_start();
if (!isset($_SESSION["id"])) {
    header('location: ../login/index.php');
    exit();
};
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            padding: 1rem;
            padding-top: 100px;
            transition: 0.3s;
            flex: 1;
        }

        @media (max-width: 768px) {
            .l-navbar {
                width: 50%;
                left: -100%;
            }

            .l-navbar.show {
                left: 0;
            }
        }
        .main-content {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>
    <?php
    require '../verify/conexao.php';  // Certifique-se de que este caminho está correto e que o arquivo define $conexao

    $id_agendamento = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if ($id_agendamento <= 0) {
        echo "ID não fornecido ou inválido.";
        exit();
    }
    
    try {
        // Consulta para obter os dados do agendamento específico
        $sql_agendamento = "SELECT * FROM agendamentos WHERE id = :id";
        $stmt_agendamento = $conexao->prepare($sql_agendamento);
        $stmt_agendamento->bindParam(':id', $id_agendamento, PDO::PARAM_INT);
        $stmt_agendamento->execute();
        $agendamento = $stmt_agendamento->fetch(PDO::FETCH_ASSOC);
    
        // Verifica se o agendamento foi encontrado
        if ($agendamento) {
            // Preencha os campos do formulário com os dados do agendamento
            $nome = $agendamento['nome'];
            $email = $agendamento['email'];
            $telefone = $agendamento['telefone'];
            $data = $agendamento['data'];
            $hora = $agendamento['hora'];
            $especie = $agendamento['especie'];
            $id_servico = $agendamento['id_servico'];
        } else {
            echo "Agendamento não encontrado.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro na consulta: " . $e->getMessage();
        exit();
    }
?>


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
                    <a href="./inicio_admin.php" class="nav_link active">
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

    <div class="main-content">
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow">
                        <div style="text-align: center; margin-bottom:10px">
                            <h2>Editar Agendamento</h2>
                        </div>
                        <div class="card-body">
                            <form action="../crudAgendamento/editar.php" method="post">
                                <input type="hidden" name="id_agendamento" value="<?php echo $id_agendamento; ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome:</label>
                                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="telefone" class="form-label">Telefone:</label>
                                            <input type="tel" name="telefone" class="form-control" id="telefone" value="<?php echo htmlspecialchars($telefone); ?>" placeholder="(00) 0000-0000" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="data" class="form-label">Data:</label>
                                            <input type="date" name="data" class="form-control" id="data" value="<?php echo $data; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="hora" class="form-label">Hora:</label>
                                            <input type="time" name="hora" class="form-control" id="hora" value="<?php echo $hora; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="especie" class="form-label">Espécie do Animal:</label>
                                    <input type="text" name="especie" class="form-control" id="especie" placeholder="Espécie do Animal" value="<?php echo htmlspecialchars($especie); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="servico" class="form-label">Serviço:</label>
                                    <select class="form-select" id="servico" name="servico" required>
                                        <option value="" disabled selected hidden>Selecione o serviço desejado</option>
                                        <?php
                                        $sql_servicos = "SELECT * FROM servicos";
                                        $stmt_servicos = $conexao->prepare($sql_servicos);
                                        $stmt_servicos->execute();
                                        $servicos = $stmt_servicos->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($servicos as $servico) {
                                            $selected = ($servico['id'] == $id_servico) ? "selected" : "";
                                            echo "<option value='{$servico['id']}' $selected>{$servico['nome']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-center mb-3">
                                    <button type="submit" class="btn btn-primary btn-lg me-3" style="width: 200px;">Salvar Alterações</button>
                                    <a href="./agendamentos.php" class="btn btn-danger btn-lg" style="width: 200px;">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>