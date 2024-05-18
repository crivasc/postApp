<?php $usuario = ($_SESSION['admin']); ?>
<div class="row">
    <div class="col-8">
        <div class="p-3 py-0 bg-light">
            <div class="controlNav d-flex align-items-center">
                <a role="button" class="btn" href="<?= BASE_URL?>">
                    <i class="icofont-automation fs-1"></i>
                    <strong><?=SITE_NAME?></strong>
                </a>
            </div>
        </div>
    </div>
    <div class="col-2">

    </div>
    <div class="col-2 col-2 d-flex justify-content-end">
        <div class="bg-light">
            <div class="actions text-center rounded-pill row">
                <div class="UserData col py-1">
                    <div id="avatar" class="circular fs-6" role="button"></div>
                </div>
                <div class="col fs-4"><a href="<?=BASE_URL?>?page=logout" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" alt="Cerrar sesión" title="Cerrar sesión">
                        <i class="icofont-power"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$().ready(function() {
    /*
    INICIAMOS LA FUNCIÓN PARA USAR LA INICIAL 
    DEL NOMBRE DE USUARIO COMO AVATAR
    */
    Avatarz('<?=$usuario;?>');
});
</script>