<?php
require_once "models/RegistroModel.php";

class RegistroController{

    public static function registro_form(){ 
        //LLAMAMOS EL FORMULARIO DE REGISTRO
        require_once "views/front/registroForm.php";
    }

    public static function registro(){
        /* FILTRAMOS LA DATA RECIBIDA DESDE EL FORMULARIO PARA PREVENIR CÓDIGO MALICIOSO */
        $_user  = trim(filter_var($_POST['txtuser'], FILTER_SANITIZE_STRING));
        $_email = trim(filter_var($_POST['txtemail'], FILTER_SANITIZE_STRING));
        $_pass  = trim(filter_var($_POST['txtpass'], FILTER_SANITIZE_STRING));

        $_hashpass = "";

        if(!empty($_pass))//ENCRIPTAMOS LA CONTRAEÑA CON HASH 
            $_hashpass = password_hash($_pass, PASSWORD_DEFAULT);

        $errors = [];//ALAMCENAMOS LOS ERRORES A MOSTRAR

        //VALIDAMOS LOS DATOS RECIBIDOS DEL FORMULARIO
        if($_SERVER['REQUEST_METHOD']==='POST'){
            
            if(empty($_user))
                $errors['user'] = 'El campo usuario es obligatorio';
               
            if(empty($_email))
                $errors['email'] = 'El campo email es obligatorio';
            elseif(!filter_var($_email, FILTER_VALIDATE_EMAIL))
                $errors['email'] = 'El formato de email debe ser tucorreo@tucorreo.tls';
                
            if(empty($_pass))
                $errors['password'] = 'El campo contraseña es obligatorio';
        }

        /* ERRORES Y ALERTAS SE ENVIARÁN COMO JSON PARA MANEJARLOS DEL LADO DEL CLIENTE */
        if($errors){
            header('location:'.BASE_URL.'?page=registro&msg='.json_encode($errors));
            
        }else{
            $alerta = [];//ALMACENAMOS LAS ALERTAS

            $_registro = new RegistroModel();
            $userdata = "'".$_user."','".$_email."','".$_hashpass."'";

            $res = []; //ALMACENAMOS LA RESPUESTA DEL SERVIDOR
            try {
                $res = $_registro->registro($userdata);//EJECUTAMOS LA FUNCIÓN ENVIANDO EL PARÁMETRO

            } catch (PDOException $th) { // MOSTRAMOS EL MENSAJE DE ERROR
                $alerta['error'] = 'El correo ingresado ya existe en el sitema.';
            }

            // SI HAY RESPUESTA MOSTRAMOS ALERTA Y DIRECCIONAMOS A LOGIN
            if($res){
                $alerta['exito'] = 'Registro exitoso, inicie sesion para continuar.';
                //Redireccionamos a la pagina de inicio
                echo "<script>
                    window.location.href = '".BASE_URL."?page=login&msga=".json_encode($alerta)."';
                </script>";
            }else{// CASO CONTRARIO MOSTRAMOS MENSAJE DE ERROR
                echo "<script>
                    window.location.href = '".BASE_URL."?page=registro&msga=".json_encode($alerta)."';
                </script>";
            }
        }   
        
    }

}
