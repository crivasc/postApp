<?php
require_once "conexionModel.php";

class LoginModel{ 

    private $_db;

    public function __construct(){
        $this->_db = new ConexionModel();
    }

    public function login($email, $password){
        //INICIAMOS LA CONEXIÓN PARA REGISTRAR LA DATA
        $this->_db->conectar();
        $res = $this->_db->conexion->prepare("SELECT * FROM usuarios WHERE (correo= :correo)");
        $values = [':correo'=>$email];
        
        try { // EJECUTAMOS EL QUERY PARA VERIFICAR EL USUARIO
            $res->execute($values);
        } catch (PDOException $e) { // SI EXISTE ERROR TERMINAMOS LA EJECUCIÓN DEL SCRIPT
            echo 'Query error.'.$e.'VALUES >'.$values;
            die();
        }
        // BUSCAMOS LA DATA DEL USUARIO AL QUE PERTENECE EL CORREO INGRESADO
        $row = $res->fetch(PDO::FETCH_ASSOC);

        $this->_db->desconectar();
        
        if (is_array($row)){ // VERIFICAMOS LA CONTRASEÑA ENCRIPTADA EN HASH
            if (password_verify($password, $row['password'])){
                return $row['usuario'];
            }else{ // SI NO COINCIDE DEVOLVEMOS FALSE
                return false;
            }
        }
        
    }
}