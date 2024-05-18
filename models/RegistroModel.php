<?php
require_once "conexionModel.php";

class RegistroModel{

    private $_db;

    public function __construct(){
        $this->_db = new ConexionModel();
    }

    public function registro($userdata){ // RECIBIMOS LA DATA DE USUARIO COMO PARÁMETRO

        $this->_db->conectar();
        //EJECUTAMOS EL QUERY PARA REGISTRAR EL NUEVO USUARIO
        $res = $this->_db->conexion->query("INSERT INTO usuarios VALUES (null, ".$userdata.")");
        $this->_db->desconectar();

        if($res)
            return true;
        else
            return false;

    }

}