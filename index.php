<?php
require_once "config/index.php";

$page = "index";
/*RECIBIMOS LOS MENSAJES DEL SERVIDOR*/
if(isset($_GET['page']))
    $page = $_GET['page'];

switch ($page) {
    case 'registro':
        require_once "controllers/RegistroController.php";
        RegistroController::registro_form();
        break;
    case 'reguser':
        require_once "controllers/RegistroController.php";
        RegistroController::registro();
        break;
    case 'login':
        require_once "controllers/LoginController.php";
        LoginController::index();
        break;
    case 'loginauth':
        require_once "controllers/LoginController.php";
        LoginController::login();
        break;
    case 'logout':
        require_once "controllers/LoginController.php";
        LoginController::logout();
        break;
    case 'admin':
        require_once "controllers/AdminController.php";
        AdminController::index();
        break;
    case 'post':
        require_once "controllers/PostController.php";
        /*lLAMAMOS A LOS DIFERENTES MÉTODOS CONFIGURADOS*/
        if(isset($_GET['opcion'])){
            $metodo = $_GET['opcion'];
            if(method_exists('PostController', $metodo)){
                PostController::{$metodo}();
            }
        }else{//El método default de la lista de posts
            PostController::listar();
        }
        break;
        /* RUTA PARA EL PROCESO DE INSTALACIÓN*/
    case 'install':
        header('location:install/');
        break;
    default:
    if(defined('SITE_NAME')){//sI NO EXISTE CONFIGURACIÓN REDIRECCIONA AL INSTALADOR
        require_once "controllers/FrontController.php";
        FrontController::index();
    }else{
        header('location:install/?page=install');
    }
    break;
}