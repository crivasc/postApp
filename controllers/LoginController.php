<?php
session_start();
require_once "models/LoginModel.php";

class LoginController{

    /* SI EXISTE LA SESIÓNREDIRIGE AL ADMIN */
    public static function index(){
        if(isset($_SESSION['admin']))
            header('location:'.BASE_URL.'?page=admin');
        //POR DEFAULT LLAMAMOS EL FORMULARIO DE LOGIN
        require_once "views/front/loginForm.php";
    }

    public static function login(){
        $_login = new LoginModel();
        /* FILTRAMOS LA DATA RECIBIDA DESDE EL FORMULARIO PARA PREVENIR CÓDIGO MALICIOSO */
        $_email = trim(filter_var($_POST['txtemail'],FILTER_SANITIZE_EMAIL));
        $_pass  = trim(filter_var($_POST['txtpass'],FILTER_SANITIZE_STRING));

        $_res   = $_login->login($_email,$_pass);

        if($_res){
            $_SESSION['admin'] = $_email; //DATA DE INICIO DE SESIÓN
            //OBTENER INFORMACIÓN DEL USUARIO PARA MOSTRAR EN ADMIN
            $username          = $_login->login($_email,$_pass);
            $_SESSION['user']  = $_res;
            
            header('location:'.BASE_URL.'?page=admin'); //SI HAY RESPUESTA DEL SERVIDOR REDIRIGE AL ADMIN
        }else{//CASO CONTARIO SE MUESTRA ERROR Y SE REDIRIGE LOGIN
            $alerta['error'] = 'Email o password incorrecto';
            echo "<script>
                window.location.href = '".BASE_URL."?page=login&msga=".json_encode($alerta)."';
            </script>";
        }
    }

    public static function logout(){
        if(!isset($_SESSION['admin']))
            header('location:'.BASE_URL);
        unset($_SESSION['admin']);
        session_destroy();
        header('location:'.BASE_URL);
    }

}