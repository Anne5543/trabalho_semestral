<?php
require 'inicio.php';
if (!isset($_SESSION["id"])) {
    header('location: ./login/index.php');
};
if (isset($_GET['success']) && $_GET['success'] == "ok") {
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="alert" class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                    Usuário cadastrado com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>