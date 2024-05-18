<?php
require_once "conexionModel.php";

class Post{

    private $_db;
    private $posts;

    public function __construct(){
        $this->_db = new ConexionModel();
    }

    public function buscar($cond){
        $this->_db->conectar();//INICIAMOS LA CONEXIÓN PARA OBTENER LA DATA
        $consulta = $this->_db->conexion->prepare("SELECT * FROM posts WHERE".$cond);
        $consulta->execute();
        // EJECUTAMOS EL QUERY PARA OBTENER LOS REGISTROS
        while($row = $consulta->fetch(PDO::FETCH_OBJ)){
            $this->posts[] = $row;
        }
        $this->_db->desconectar();
        return $this->posts;
    }

    public function nuevo($data){
        $this->_db->conectar();//INICIAMOS LA CONEXIÓN PARA REGISTRAR LA DATA
        $consulta = $this->_db->conexion->query("INSERT posts VALUES(NULL,".$data.")");
        $this->_db->desconectar();
        if($consulta)
            return true;
        else
            return false;
    }

    public function editar($data, $cond){
        $this->_db->conectar();//INICIAMOS LA CONEXIÓN PARA EDITAR LA DATA
        $consulta = $this->_db->conexion->query("UPDATE posts SET ".$data."WHERE ".$cond);
        $this->_db->desconectar();
        if($consulta)
            return true;
        else
            return false;
    }

    public function eliminar($cond){
        $this->_db->conectar();//INICIAMOS LA CONEXIÓN PARA ELIMINAR EL ITEM
        $consulta = $this->_db->conexion->query("DELETE FROM posts WHERE ".$cond);
        $this->_db->desconectar();
        if($consulta)
            return true;
        else
            return false;
    }

}