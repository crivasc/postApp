<?php

require_once "models/PostModel.php";

class FrontController {
    public static function index(){
        //MOSTRAREMOS LOS CONTENIDOS DESDE EL MODELO POSTS
        $post = new Post();
        $data = $post->buscar('1');
        require_once "views/front/main.php";
    }
}