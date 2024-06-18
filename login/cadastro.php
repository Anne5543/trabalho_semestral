<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../script.js"></script>
    <style>
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

        .form-group label::after {
            content: '*';
            color: red;
            margin-left: 5px;
        }

        @media (max-width: 1274px) {
            form {
                height: 650px;
                width: 90%;
                max-width: 535px;
            }

            #img2 {
                height: 690px;
                width: 100%;
                max-width: 590px;
            }

            .links {
                margin-top: 40px;
            }

            .formulario {
                transform: scale(0.9);
            }

            .form-group label {
                padding-right: 30%;
            }
        }

        @media (max-width: 1203px) {
            form {
                height: 635px;
                width: 90%;
                max-width: 500px;
            }

            #img2 {
                height: 675px;
                width: 100%;
                max-width: 560px;
            }

            .links {
                margin-top: 25px;
            }

            .formulario {
                transform: scale(0.86);
            }

            .form-group label {
                padding-right: 30%;
            }
        }

        @media (max-width: 1123px) {
            form {
                height: 630px;
                width: 90%;
                max-width: 500px;
            }

            #img2 {
                height: 670px;
                width: 100%;
                max-width: 550px;
            }

            .form-group label {
                padding-right: 30%;
            }

            .links {
                margin-top: 25px;
            }
        }

        @media (max-width: 1015px) {
            form {
                height: 645px;
                width: 90%;
                max-width: 780px;
            }

            #img2 {
                display: none;
            }

            .links {
                margin-top: 45px;
            }

            .form-group label {
                padding-right: 40%;
            }
        }

        @media (max-width: 870px) {
            form {
                height: 625px;
                width: 90%;
                max-width: 720px;
            }

            .formulario {
                transform: scale(0.83);
            }

            .form-group label {
                padding-right: 30%;
            }
        }

        @media (max-width: 800px) {
            form {
                height: 600px;
                width: 90%;
                max-width: 700px;
            }

            .formulario {
                transform: scale(0.8);
            }

            .form-group label {
                padding-right: 30%;
            }

            .submit {
                transform: scale(0.85);
            }

            .links {
                margin-top: 20px;
            }
        }

        @media (max-width: 740px) {
            form {
                height: 610px;
                width: 90%;
                max-width: 420px;
                transform: scale(0.9);
            }

            .form-group label {
                width: 140px;
                display: block;
                margin-left: 50px;
            }

            .formulario {
                transform: scale(0.85);
            }

            .links {
                margin-top: 25px;
            }
        }

        @media (max-width: 507px) {
            form {
                height: 630px;
                width: 90%;
                max-width: 430px;
                transform: scale(0.8);
            }

            .form-group label {
                width: 130px;
                display: block;
                margin-left: 50px;
            }

            .formulario {
                margin-top: -20px;
                transform: scale(0.9);
            }
        }

        @media (max-width: 470px) {
            form {
                height: 625px;
                width: 90%;
                max-width: 470px;
                transform: scale(0.7);
            }

            .formulario {
                margin-top: -25px;
                transform: scale(0.88);
            }
        }
    </style>
</head>

<body>
    <div class="login">
        <form action="../crudCadastro/cadastrar.php" method="post" data-parsley-validate>
            <div class="formulario">
                <div class="form-container">
                    <h1 class="destaque">PetCharm</h1>
                    <p class="destaque">Cadastre-se para cuidar ainda melhor do seu pet! 🐾</p>

                    <div class="form-group">
                        <label class="label1" for="usuario">Digite seu nome:</label>
                        <input type="text" id="usuario" name="usuario" placeholder="Nome" class="text" required>
                    </div><br>

                    <div class="form-group">
                        <label class="label1" for="login">Digite seu email:</label>
                        <input type="email" id="login" name="login" placeholder="Email" class="text" required>
                    </div><br>

                    <div class="form-group">
                        <label class="label1" for="senha">Digite sua senha:</label>
                        <input type="password" id="senha" name="senha" placeholder="Senha" class="text" required>
                    </div><br>

                    <button type="button" id="mos" onclick="mostrar()" class="submit">Mostrar senha</button><br><br>
                    <input type="submit" value="Cadastrar" class="submit" name="submit">

                    <div class="links">
                        <p class="destaque">Tem uma conta? <a href="./index.php">Conecte-se</a></p>
                    </div>
                </div>
            </div>
        </form>
        <img id="img2" src="../images/petcharm.png" alt="img">
    </div>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/parsleyjs/dist/parsley.min.js"></script>
    <script src="../node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
    <link rel="stylesheet" href="../node_modules/parsleyjs/src/parsley.css">
</body>

</html>