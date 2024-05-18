<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=SITE_NAME?></title>
    <link rel="shortcut icon" href="<?=BASE_URL?>public/automation.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?=BASE_URL?>lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>lib/icofont/icofont.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>lib/css/animate.min.css" />
    <link rel="stylesheet" href="<?=BASE_URL?>public/styles/global.css">
    

    <!-- <script src="< ?=BASE_URL?>lib/js/bootstrap.bundle.min.js"></script> -->
    <script src="<?=BASE_URL?>lib/js/jquery.js"></script>
    <script src="<?=BASE_URL?>lib/js/ckeditor.js"></script>
    <script src="<?=BASE_URL?>lib/js/jquery.validate.js"></script>


</head>

<body>
    <!--Box container-->
    <div id="thebox" class="animate__animated animate__faster visually-hidden">
        <!-- DATA DE USUARIO -->
        <div class="boxcontainer box1">
            <div id="userActions" class="card" style="width: 18rem;">
                <div class="card-header d-flex justify-content-between">
                    <div class="col text-center">
                        <h5 class="modal-title text-capitalize"><?= $_SESSION['user'] ?></h5>
                    </div>
                    <button type="button" class="btn-close modalCloser" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="card-body text-center col">
                    <b><?= $_SESSION['admin'] ?></b>
                    <hr>
                    <div class="my-2">
                        <a href="<?=BASE_URL?>?page=logout" alt="Cerrar sesión" title="Cerrar sesión"
                            class="text-danger">
                            <span class="fs-6">Cerrar sesión &nbsp;</span><i class="icofont-power fs-4"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN DATA DE USUARIO -->
        <!-- FORMULARIO DE POSTS -->
        <div class="boxcontainer posts box2">
            <div id="postActions" class="card mx-auto col-12">
                <div class="card-header d-flex justify-content-between">
                    <div class="col text-center">
                        <h5 class="modal-title text-capitalize">Nuevo post</h5>
                    </div>
                    <button type="button" class="btn-close modalCloser cancelpost" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <?php require_once 'views/admin/posts/nuevo.php';?>
            </div>
        </div>
        <!-- FIN FORMULARIO DE POSTS -->
        <!-- FORMULARIO DE POSTS VER -->
        <div class="boxcontainer posts box3">
            <div id="verActions" class="postitems card mx-auto col-12">
                <div class="card-header d-flex justify-content-between">
                    <div class="col text-center">
                        <h5 class="modal-title text-capitalize">Post</h5>
                    </div>
                    <button type="button" class="btn-close modalCloser" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <?php require_once 'views/admin/posts/post.php';?>
            </div>
        </div>
        <!-- FIN FORMULARIO DE POSTS VER -->
        <!-- FORMULARIO DE POSTS EDITAR -->
        <div class="boxcontainer posts box4">
            <div id="editActions" class="postitems card mx-auto col-12">
                <div class="card-header d-flex justify-content-between">
                    <div class="col text-center">
                        <h5 class="modal-title text-capitalize">Editar post</h5>
                    </div>
                    <button type="button" class="btn-close modalCloser cancelpost" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <?php require_once 'views/admin/posts/editar.php';?>
            </div>
        </div>
        <!-- FIN FORMULARIO DE POSTS EDITAR -->
    </div>
    <!--fin box container-->