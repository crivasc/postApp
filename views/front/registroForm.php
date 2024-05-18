<?php require_once "views/layout/admin/header.php"; ?>

<div id="registro" class="container">
    <div class="row justify-content-center">

        <?php require_once "views/layout/admin/alertas.php"; ?>

        <div class="card col-sm-4 my-5">
            <div class="card-header text-center my-3 text-secondary">
                <h4 class="card-title fs-6">REGISTRO</h4>
            </div>
            <div class="card-body">
                <form  id="user-form" action="<?= BASE_URL ?>?page=reguser" method="post" class="row g-2 validar"
                    novalidate>
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" name="txtuser" placeholder="Usuario" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <input type="email" class="form-control" name="txtemail" placeholder="Email" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <input type="password" class="form-control" name="txtpass" id="txtpass" placeholder="Password" required>
                        <i id="showpass" class="icofont-eye-blocked fs-5 text-secondary"></i>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block" name="btnlogin">Registrarse</button>
                    </div>
                </form>
            </div>
            <div class="card-footer my-3 fs-7 text-center">
                <span>Si ya tiene una cuenta <a href="<?= BASE_URL ?>?page=login">inicie Sesión</a></span>
            </div>
        </div>
    </div>
</div>
<script src="<?=BASE_URL?>public/js/validaciones.js"></script>
<?php require_once "views/layout/admin/footer.php"; ?>