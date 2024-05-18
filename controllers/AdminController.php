<?php
session_start();
if(!isset($_SESSION['admin']))
    header('location:'.BASE_URL);

require_once "models/PostModel.php";

class AdminController{
    //MOSTRAREMOS LOS CONTENIDOS DESDE EL MODELO POSTS
    public static function index(){
        $post = new Post();
        $data = $post->buscar('1');
        require_once "views/admin/control.php";
    }
}