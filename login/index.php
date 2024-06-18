<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../script.js"></script>
    <style>
        form {
            background-color: #f9f9f9;
            border-radius: 7px;
            width: 550px;
            height: 615px;
            padding: 20px;
            text-align: center;
        }

        .login1 {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .links1 {
            margin-top: 40px;
            justify-content: center;
        }

        .links1 a {
            color: #0a5ba2;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .links1 a:hover {
            color: #85b7e2;
            text-decoration: underline;
        }

        form,
        #img2,
        .formulario,
        .submit,
        .form-group label {
            transition: all 0.3s ease;
        }

        .form-group label {
            white-space: nowrap;
        }

        .form-group label {
            transition: all 0.3s ease;
        }

        .form-group label::after {
            content: '*';
            color: red;
            margin-left: 5px;
        }


        @media (max-width: 1274px) {
            form {
                height: 570px;
                width: 90%;
                max-width: 500px;
            }

            #img {
                height: 605px;
                width: 100%;
                max-width: 500px;
            }

            .links {
                margin-top: 30px;
            }

            .row {
                transform: scale(0.86);
            }

            .form-group label {
                padding-right: 46%;
            }
        }

        @media (max-width: 1203px) {
            form {
                height: 570px;
                width: 90%;
                max-width: 450px;
            }

            #img {
                height: 610px;
                width: 100%;
                max-width: 450px;
            }

            .links {
                margin-top: 20px;
            }

            .row {
                transform: scale(0.86);
            }

            .form-group label {
                padding-right: 44%;
            }
        }

        @media (max-width: 1123px) {
            form {
                height: 565px;
                width: 90%;
                max-width: 450px;
            }

            #img {
                height: 605px;
                width: 100%;
                max-width: 450px;
            }

            .links {
                margin-top: 20px;
            }
        }

        @media (max-width: 1108px) {
            form {
                height: 540px;
                width: 90%;
                max-width: 400px;
            }

            #img {
                height: 580px;
                width: 100%;
                max-width: 520px;
            }

            .links {
                margin-top: 20px;
            }

            .row {
                margin-top: -20px;
                transform: scale(0.85);
            }
        }

        @media (max-width: 1015px) {
            form {
                height: 540px;
                width: 90%;
                max-width: 750px;
            }

            #img {
                display: none;
            }

            .links {
                margin-top: 40px;
            }

            .form-group label {
                padding-right: 30%;
            }

            .row {
                transform: scale(0.85);
            }
        }

        @media (max-width: 870px) {
            form {
                height: 550px;
                width: 90%;
                max-width: 670px;
            }

            .form-group label {
                padding-right: 30%;
            }
        }

        @media (max-width: 800px) {
            form {
                height: 540px;
                width: 90%;
                max-width: 630px;
            }

            .row {
                transform: scale(0.85);
            }

            .form-group label {
                padding-right: 30%;
            }

            .submit {
                transform: scale(0.85);
            }
        }

        @media (max-width: 740px) {
            form {
                height: 540px;
                width: 90%;
                max-width: 400px;
                transform: scale(0.9);
            }

            .form-group label {
                width: 140px;
                display: block;
                margin-left: 50px;
            }

            .row {
                margin-top: -20px;
                transform: scale(0.85);
            }
        }

        @media (max-width: 507px) {
            form {
                height: 555px;
                width: 90%;
                max-width: 400px;
                transform: scale(0.8);
            }

            .form-group label {
                width: 130px;
                display: block;
                margin-left: 50px;
            }

            .row {
                margin-top: -20px;
                transform: scale(0.9);
            }
        }

        @media (max-width: 420px) {
            form {
                height: 550px;
                width: 90%;
                max-width: 490px;
                transform: scale(0.7);
            }

            .row {
                margin-top: -20px;
                transform: scale(0.85);
            }
        }
    </style>
</head>

<body>
    <div class="login1">
        <form action="../verify/entrar.php" method="post" data-parsley-validate id="loginForm">
            <div class="row">
                <h1 class="destaque">PetCharm</h1>
                <p class="destaque">Faça login para cuidar ainda melhor do seu pet! 🐾</p><br>

                <div class="form-group">
                    <label for="">Digite seu email:</label>
                    <input type="email" name="login" placeholder="Email" class="text" required>
                </div><br>

                <div class="form-group">
                    <label for="">Digite sua senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" class="text" required><br><br>
                </div><br>

                <button type="button" id="mos" onclick="mostrar()" class="submit">Mostrar senha</button> <br><br>
                <input type="submit" value="Entrar" class="submit" name="submit">

                <div class="links1">
                    <p class="destaque">Não tem uma conta? <a href="./cadastro.php">Cadastre-se</a></p>
                </div>
            </div>
        </form>

        <img id="img" src="../images/pettcharm.png" alt="img">
    </div>

    <script src="../node_modules/jquery/dist//jquery.min.js"></script>
    <script src="../node_modules/parsleyjs/dist/parsley.min.js"></script>
    <script src="../node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
    <link rel="stylesheet" href="../node_modules/parsleyjs/src/parsley.css">
</body>

</html>

<script>
    $(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('error')) {
            alert(" Seu e-mail ou senha estão incorretos.");
        }
    })
</script>