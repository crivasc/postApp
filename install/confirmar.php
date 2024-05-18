<?php require_once '../config/index.php'; 
if(!defined('SITE_NAME')){
    echo 'Acceso no autrizado!';
    header('location:./?page=install');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=SITE_NAME?></title>
    <link rel="stylesheet" href="<?=BASE_URL?>lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>lib/icofont/icofont.min.css">
</head>

<body>
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <div class="">
                <i class="icofont-automation" style="font-size:6rem; color:rgb(2 67 71);"></i>
            </div>
            <h1><?=SITE_NAME?> </h1>
            <p class="card-text">El contenido demo se ha instalado correctamente</p>
            <small class="card-text text-secondary ">las credenciales para ingresar son:</small>
            <div class="my-2 text-secondary text-center">
                <small>usuario: admin@admin.com <br /> password: admin</small>
            </div>
            <div>
                <a href="<?=BASE_URL.'?page=login'?>" target="_blank" class="my-2 btn btn-sm btn-success shadow-sm">Login</a>

                <a href="<?=BASE_URL?>" class="my-2 btn btn-sm btn-success shadow-sm">Ir al home</a>
            </div>    
        </div>
    </div>
</body>

</html>