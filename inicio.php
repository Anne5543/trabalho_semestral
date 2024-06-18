<?php
session_start();
if (!isset($_SESSION["id"])) {
    header('location: ./login/index.php');
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
            font-size: 21px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .nav-item {
            padding: 8px 0px;
        }

        html {
            scroll-behavior: smooth;
        }

        #inicio {
            scroll-margin-top: 100px;
        }

        body {
            padding-top: 70px;
            background-color: #f2f2f2;

        }

        #logo {
            height: 55px;
            width: 155px;
        }

        .nav-logo {
            margin-right: 100px;
        }

        #perfil {
            height: 55px;
            width: 90px;
        }

        #banner {
            height: 93vh;
            width: 100%;
            display: block;
            margin: 0;
        }

        #sobre {
            scroll-margin-top: 94px;
            height: 100vh;
            margin-bottom: 50px;
        }
    
        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-title {
            color: #333;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-text {
            color: #666;
        }
        .price {
            color: #FF6B6B;
            font-size: 1.25rem;
            font-weight: bold;
        }
        
        #texto {
            flex: 1;
            text-align: center;
            margin-left: 40px;
        }

        #serviços {
            scroll-margin-top: 91px;
            margin-top: 50px;
        }

        h1 {
            text-align: center;
        }

     
        #agendamentos {
            scroll-margin-top: 48px;
            padding-top: 50px;
            height: 90vh;
        }
        #precos{
            scroll-margin-top: 95px;
        }

        @media (max-width: 991.98px) {
            #perfil {
                display: none;
            }
            
        }

        @media screen and (max-width: 768px) {
            #forcon {
                flex-direction: column;
            }

            #cont {
                margin-bottom: 20px;
            }

            .btn {
                margin-bottom: 20px;
            }
            #imagem{
                display: none;
            }
            
        }

        @media only screen and (max-width: 750px) {
            #banner {
                max-width: 100%;
                height: auto;
            }

            #imagem {
                width: 100%;
                max-width: 100%;
                height: auto;
            }

            #texto {
                font-size: 12px;
                margin-left: 0;
            }

            #sobre {
                flex-direction: column;
                padding-top: 20px;
            }

            h1 {
                font-size: 20px;
            }
        }
        .alert {
            position: absolute;
            width: 70%;
            top: 15%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            text-align: center;
            font-size: 18px;
        }

        .container-fluid {
            padding-left: 15px;
            padding-right: 15px;
        }

        .conteiner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        } 

        .row-cols-1.row-cols-md-3.g-3 .col {
            margin-bottom: -100px;
        }

        #contatos {
            color: #000;
            padding: 50px 0 0;
            transform: scale(0.92);
        }

        #forcon {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        #cont {
            display: flex;
            flex-direction: column;
        }

        #formasc {
            flex-direction: column;
            display: flex;
        }

        #contatos h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        #contatos p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        #contatos h3 {
            font-size: 18px;
        }

        #contatos input {
            width: 50%;
            height: 50px;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        #contatos button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #contatos button:hover {
            background-color: #826ff1;
        }

        #contatos button:active {
            background-color: #1d155f;
        }

        .foo1 {
            color: #fff;
            text-align: center;
        }

        .foo2 {
            height: 50px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #7c137b;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .foo2 p {
            font-size: 17px;
        }

        .btn {
            align-items: center;
            justify-content: center;
            width: 100px;
            height: 60px;
            padding: 0;
            text-decoration: none;
        }
        .feature-icon {
            font-size: 2rem;
            color: #FF6B6B;
        }
        @media only screen and (max-width: 466px) {
            #banner {
                max-width: 100%;
                height: auto;
            }
        }
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background:#7c137b">
        <div class="container-fluid">
            <img src="./images/logo.png" id="logo" alt="logo" class="nav-logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#serviços">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#agendamentos">Agendamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contatos">Contatos</a>
                    </li>
                </ul>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand me-0" href="#"><img src="./images/perfil.png" alt="perfil" id="perfil"></a>
            <div class="collapse navbar-collapse" id="navbarNav2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style=" margin-right: 20px; margin-left:15px">
                            <?php echo $_SESSION['usuario']; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal">Redefinir senha</a></li>
                            <li><a id="excluir" class="dropdown-item" href="./crudCadastro/delete.php">Excluir conta</a></li>
                            <li><a id="logout" class="dropdown-item" href="./verify/logout.php">Sair da conta</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </nav>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Redefinição de senha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <form action="./crudCadastro/redefinirSenha.php" method="post">
                        <label for="">Senha atual: <span style="color: red;">*</span></label><br>
                        <input type="text" name="senhaAtual"><br><br>
                        <label for="">Nova senha: <span style="color: red;">*</span></label><br>
                        <input type="text" name="novaSenha"><br><br>
                        <label for="">Confirmar senha: <span style="color: red;">*</span></label><br>
                        <input type="text" name="confirmarSenha"><br><br>
                        <input type="submit" class="btn btn-primary" value="Alterar"></submit>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


<script>
    document.getElementById('excluir').addEventListener('click', function(event) {
        event.preventDefault();
        var modal = new bootstrap.Modal(document.getElementById('modalExcluirConta'), {});
        modal.show();
    });

    document.getElementById('logout').addEventListener('click', function(event) {
        event.preventDefault();
        var modal = new bootstrap.Modal(document.getElementById('modalLogout'), {});
        modal.show();
    });
</script>



<div class="modal fade" id="modalExcluirConta" tabindex="-1" aria-labelledby="modalExcluirContaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalExcluirContaLabel">Excluir Conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir sua conta?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <a href="./crudCadastro/delete.php" id="logout"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">Excluir</button></a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLogoutLabel">Sair da Conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja sair da conta?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <a href="./login/index.php" id="logout"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sair</button></a>
            </div>
        </div>
    </div>
</div>

    
<div id="inicio">
        <img src="./images/banner.png" alt="banner" id="banner">
    </div><br>
    <section class="container my-5" id="sobre">
    <div class="row align-items-center">
      <div class="col-md-6 text-center">
        <img src="./images/3.png" class="img-fluid rounded-circle" style="margin-right: 60px; width:400px; margin-top:20px;" alt="Imagem de animais" id="imagem">
      </div>
      <div class="col-md-6">
        <h1 class="display-4"><strong style="font-size:40px">PetCharm</strong></h1>
        <p class="lead"  style="text-align:justify">Somos o PetCharm, e nos dedicados ao bem-estar e felicidade dos animais de estimação. Oferecemos uma ampla gama de serviços personalizados, incluindo grooming profissional, adestramento, consultas e entre outros.</p>
      </div>
    </div>
    <div class="row my-5">
    <div class="col-md-6" >
        <h2 class="display-4"><strong style="font-size:40px">O que nos diferencia</strong></h2>
        <ul class="list-unstyled">
          <li class="lead"  style="text-align:justify; font-size:17px">🐾 Compromisso com o bem-estar de seu animal</li>
          <li class="lead"  style="text-align:justify; font-size:17px">🐾Qualidade garantida</li>
            <li class="lead"  style="text-align:justify; font-size:17px">🐾Preços que cabem no seu bolso</li>
        </ul>
        </div>
      <div class="col-md-6">
        <h2 class="display-4" style="text-align:center;"><strong style="font-size:40px">Nossa Missão</strong></h2>
        <p class="lead"  style="text-align:justify; font-size:17px">Nosso objetivo é proporcionar uma experiência acolhedora e amigável para você e seus pets. Visite-nos e faça parte da nossa jornada de cuidado e amor pelos animais de estimação.</p>
      </div>
    </div>
    </section>

    <div id="serviços" class="container">
        <h1 style="margin-bottom:-60px; text-align: center;">Serviços</h1>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col mt-3">
                <div class="card shadow" style="transform: scale(0.72);">
                    <img class="card-img-top" src="./images/banho.png" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Banhos <span style="margin-left: 185px">R$ 25,00</span></h4>
                        <p class="card-text" > Oferecemos banhos completos com produtos de alta qualidade, garantindo higiene e bem-estar para seu pet.</p>
                    </div>
                </div>
            </div>

            <div class="col mt-3">
                <div class="card shadow" style="transform: scale(0.72);">
                    <img class="card-img-top" src="./images/tosa.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Tosa<span style="margin-left: 230px">R$ 30,00</span></h4>
                        <p class="card-text">Nosso pet shop oferece serviços de tosa especializados, adequados às necessidades e ao estilo de cada animal.</p>
                    </div>
                </div>
            </div>

            <div class="col mt-3">
                <div class="card shadow" style="transform: scale(0.72);">
                    <img class="card-img-top" src="./images/consultas.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Consultas<span style="margin-left: 150px">R$ 100,00</span></h4>
                        <p class="card-text" style="text-align:justify;">No nosso pet shop, entendemos o quanto seu animal de estimação significa para você. É por isso que oferecemos consultas veterinárias.</p>
                    </div>
                </div>
            </div>
            <div class="col mt-3">
                <div class="card shadow" style="transform: scale(0.72);">
                    <img class="card-img-top" src="./images/adestramento.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Adestramento <span style="margin-left: 20px">R$ 90,00(Sessão)</span></h4>
                        <p class="card-text"  style="text-align:justify;">Oferecemos serviços de adestramento dedicados a promover uma convivência harmoniosa entre você e seu animal de estimação.</p>
                    </div>
                </div>
            </div>
            <div class="col mt-3">
                <div class="card shadow" style="transform: scale(0.72);">
                    <img class="card-img-top" src="./images/grooming.jpg" alt="Card image" style="height: 230px;">
                    <div class="card-body">
                        <h4 class="card-title">Grooming <span style="margin-left: 150px">R$ 120,00</span></h4>
                        <p class="card-text">Nosso pet shop oferece serviços de grooming completos, que incluem banho, tosa, corte de unhas, limpeza de ouvidos e hidratação. </p>
                    </div>
                </div>
            </div>

            <div class="col-sm" style="margin-top: -8%;">
                <div style="transform: scale(0.72);">
                    <div class="card-body">
                         <img src="./images/serviços.png" alt="" style="margin-left:-20%">
                        <p class="card-text" style="text-align: center; margin-top:-100px;"><a href="#agendamentos"><button type="submit" class="btn btn-primary">AGENDAR</button></a>
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>

    <div class="container" id="agendamentos">
        <h3 class="text-center mb-4">AGENDAMENTOS DE SERVIÇOS</h3>
        <div style="text-align: center;">
        <p><strong> Funcionamos de segunda a sábado/ De 8:00 h às 18:00h</strong></p>
        </div>
        <form action="./crudAgendamento/agendar.php" method="post" style="max-width: 400px; margin: 0 auto; border: 1px solid #ced4da; padding: 20px; border-radius: 10px;">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome<span style="color: red;">*</span></label>
                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email<span style="color: red;">*</span></label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone<span style="color: red;">*</span></label>
                        <input type="tel" name="telefone" class="form-control" id="telefone" onkeypress="$(this).mask('(00) 0000-0000')" placeholder="(00) 0000-0000" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="data" class="form-label">Data<span style="color: red;">*</span></label>
                        <input type="date" name="data" class="form-control" id="data"required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora<span style="color: red;">*</span></label>
                        <input type="time" name="hora" class="form-control" id="hora" required>
                    </div>
                </div>
                <div class="mb-3">
                <label for="especie" class="form-label">Espécie do Animal<span style="color: red;">*</span></label>
                <input type="text" name="especie" class="form-control" id="especie" placeholder="Espécie do Animal" required>
            </div>
            </div>
            <div class="mb-3">
                <label for="servico" class="form-label">Serviço<span style="color: red;">*</span></label>
                <select class="form-select" id="servico" name="servico" required>
                    <option value="" disabled selected hidden>Selecione o serviço desejado<span style="color: red;">*</span></option>
                    <?php
                    require './verify/conexao.php';
                    $sql_servicos = "SELECT * FROM servicos";
                    $stmt_servicos = $conexao->prepare($sql_servicos);
                    $stmt_servicos->execute();
                    $servicos = $stmt_servicos->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($servicos as $servico) {
                        echo "<option value='{$servico['id']}'>{$servico['nome']}</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">AGENDAR</button>
        </form>
    </div>
    
    <div id="contatos">
            <div id="forcon" class="container">
                <div id="cont">
                    <h1>FALE CONOSCO</h1>
                    <p>Para entrar em contato com a nossa equipe, por favor, preencha o formulário abaixo.</p>
                    <form action="./contatos/contatos.php" method="post">
                    <label style="font-size: 18px;"><strong>Nome: <span style="color: red;">*</span></strong></label><br>
                    <input type="text" name="nome"  placeholder="Digite seu nome"><br> 
                    <label style="font-size: 18px;"><strong>Telefone: <span style="color: red;">*</span></strong></label><br>
                    <input type="tel" name="telefone" class="form-control" id="telefone" onkeypress="$(this).mask('(00) 0000-0000')" placeholder="(00) 0000-0000" required>
                    <label style="font-size: 18px;"><strong>Email: <span style="color: red;">*</span></strong></label><br>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu email" required>
                    <label style="font-size: 18px;"><strong>Seu Comentário: <span style="color: red;">*</span></strong></label><br>
                    <input type="text" name="comentario" placeholder="Digite seu Comentário"><br>
                    <input  class="btn btn-primary" type="submit" value="ENVIAR" style=" width: 120px;"></input>
                    </form>
                </div>

                <div id="formasc">
                    <h2>Formas de contato</h2>
                    <h5>EMAIL:</h5>
                    <p>anne.brandao@aluno.ce.gov.br</p>
                    <h5>TELEFONE:</h5>
                    <p>(88)9 1234-5678</p>
                    <h5>LOCALIZAÇÃO:</h5>
                    <p>Bairro nossa senhora de fátima, Russas-CE</p>
                </div>
            </div>

            
        <footer class="foo1">
            <div class="container text-center mt-5">
                <a href="https://www.facebook.com/annecarolineteixeira.brandao.5?locale=pt_BR" class="btn btn-primary btn-icon btn-facebook" target="_blank">
                    <img src="./images/facebook.png" style="margin-top:4px;  height:50px; width:50px;" alt="facebook">
                </a>
                <a href="https://x.com/Anne67583888" class="btn btn-dark" target="_blank" style="color:#000">
                    <img src="./images/x.png" alt="Twitter" style="margin-top:10px; height:35px; width:35px;">
                </a>
                <a href="https://www.instagram.com/annecarolinetei/" class="btn" target="_blank" style="background-image: linear-gradient(45deg, #405de6,#5851db, #833ab4, #c13584, #e1306c, #fd1d1d);  padding: 10px;">
                    <img src="./images/instagram.png" alt="instagram" style="margin-top: -15px; height: 70px; width: 70px; display: block;">
                </a>
            </div>
        </div>
        </footer>
        <footer class="foo2">
            <p>&copy;2024. Todos os direitos reservados.</p>
        </footer>
    

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    </div>
</body>

</html>