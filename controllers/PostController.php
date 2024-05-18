<?php
session_start();
if(!isset($_SESSION['admin']))
    header('location:'.BASE_URL);

require_once "models/PostModel.php";

class PostController{

    public static function listar(){
        //MOSTRAREMOS LOS CONTENIDOS DESDE EL MODELO SI EXISTE LA SESIÓN ADMIN
        if(isset($_SESSION['admin']))
            $post = new Post();
            $data = $post->buscar('1');
        require_once "views/admin/control.php";//VISTA DEL ADMINISTRADOR
    }

    public static function insertar(){
        //RECIBIMOS LA DATA DEL FORMULARIO
        $_titulo    = $_REQUEST['txtitulo'];
        $_contenido = $_REQUEST['txtcont'];
        $_fecha     = date("Y-m-d h:m:s");
        $_update    = date("Y-m-d h:m:s");

        $errors = [];//ALMACENAMOS LOS ERRORES A MOSTRAR

        //VALIDAMOS LA DATA RECIBIDA DEL FORMULARIO
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(empty($_titulo) && empty($_contenido))
                $errors['error'] = 'Todos los campos son obligatorios';
            if(empty($_titulo))
                $errors['error'] = 'El título es obligatorio';
            if(empty($_contenido))
                $errors['error'] = 'El contenido es obligatorio';
       }
       
       /* ERRORES Y ALERTAS SE ENVIARÁN COMO JSON PARA MANEJARLOS DEL LADO DEL CLIENTE */
       if($errors){
            header('location:'.BASE_URL.'?page=admin&msga='.json_encode($errors));
       }else{
            $alerta=[];//ALMACENAMOS LAS ATERTAS

            $post    = new Post();

            //PREPARAMOS LA DATA PARA ENVIAR A LA BD
            $data = "'".$_titulo."','".$_contenido."','".$_fecha."','".$_update."'";

            try {
                $accion = $post ->nuevo($data);
            } catch (PDOException $th) {
                //SI LANZA ERRORES MOSTRAMOS UNA ALERTA
                $alerta['error'] = 'Intentaste meter código prohibido, ya sabemos donde vives...';
            }

            if($accion){ //SI HAY RESPUESTA MOSTRAMOS ALERTA
                $alerta['exito'] = 'El nuevo post se ha registrado con éxito';
                header("location:".BASE_URL."?page=admin&msga=".json_encode($alerta));
            }else{//CASO CONTRARIO MOSTRAMOS ALERTA DE ERROR
                header("location:".BASE_URL."?page=admin&msga=".json_encode($alerta));
            }
       }
    }

    public static function editar(){
        //RECIBIMOS LA DATA DEL FORMULARIO
        $_id        = $_REQUEST['txtid'];
        $_titulo    = $_REQUEST['txtitulo'];
        $_contenido = $_POST['txtcont'];
        $_update    = date("Y-m-d h:m:s");

         $errors = [];//ALMACENAMOS LOS ERRORES A MOSTRAR

        //VALIDAMOS LA DATA RECIBIDA DEL FORMULARIO
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(empty($_titulo) && empty($_contenido))
                $errors['error'] = 'Todos los campos son obligatorios';
            if(empty($_titulo))
                $errors['error'] = 'El título es obligatorio';
            if(empty($_contenido))
                $errors['error'] = 'El contenido es obligatorio';
        }

        /* ERRORES Y ALERTAS SE ENVIARÁN COMO JSON PARA MANEJARLOS DEL LADO DEL CLIENTE */
        if($errors){
            header('location:'.BASE_URL.'?page=admin&msga='.json_encode($errors));
        }else{
            $alerta=[]; //ALMACENAMOS LAS ALERTAS
            $post   = new Post();
            $data   = "titulo='".$_titulo."',contenido='".$_contenido."',updated='".$_update."'";
            
            try {//
                $accion = $post ->editar($data, "id=".$_id); //EJECUTAMOS LA FUNCIÓN CON EL PARÁMETRO DEL ITEM A EDITAR
            } catch (PDOException $th) {
                //SI RECIBIMOS ERROR ENVIAMOS A LA ALERTA
                $alerta['error'] = 'Intentaste meter código prohibido, ya sabemos donde vives...';
            }

            if($accion){// SI HAY RESPUESTA MOSTRAMOS ALERTA DE ÉXITO
                $alerta['exito'] = 'El nuevo post ha sido editado con éxito';
                header("location:".BASE_URL."?page=admin&msga=".json_encode($alerta));
            }else{//CASO CONTRARIO MOSTRAMOS ALERTA DE ERROR
                header("location:".BASE_URL."?page=admin&msga=".json_encode($alerta));
            }
        }
    }

    public static function eliminar(){
        $post = new Post();
        //EJECUTAMOS LA FUNCIÓN CON EL PARÁMETRO DEL ITEM A ELIMINAR
        $data = $post->eliminar("id=".$_REQUEST['id']);
        header("location:".BASE_URL."?page=admin");
    }
}