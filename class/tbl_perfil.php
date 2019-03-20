<?php
include_once('basedatos.php');

class tbl_perfil extends basedatos {
    private $id_perfil;
    private $nombre_perfil;

    function __construct($id_perfil=NULL, $nombre_perfil=NULL){
        $this->id_perfil = $id_perfil;
        $this->nombre_perfil = $nombre_perfil;
        $this->tabla = "tbl_perfil";
    }

    function getId_perfil() {
        return $this->id_perfil;
    }

    function getNombre_perfil() {
        return $this->nombre_perfil;
    }

    function setId_perfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }

    function setNombre_perfil($nombre_perfil) {
        $this->nombre_perfil = $nombre_perfil;
    }

    public function insertar(){
        $campos = array("id_perfil", "nombre_perfil");
        $valores = array(
            array(
                $this->id_perfil,
                $this->nombre_perfil
            )
        );
        $resultado = $this->insertarRegistros($campos, $valores);
        $this->desconectar();
        if($resultado[0] == "OK"){
            return true;
        }else{
            return false;
        }
    }
    public function consultar(){
        $sql =  "SELECT * FROM tbl_perfil WHERE id_perfil = :id_";
        $parametros = array(":id_"=>$this->id_perfil);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_perfil($res['id_perfil']);
            $this->setNombre_perfil($res['nombre_perfil']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_perfil", "nombre_perfil");
        $valores = array(
            $this->id_perfil,
            $this->nombre_perfil
        );
        $llaveprimaria = "id_perfil";
        $valorllaveprimaria = $this->id_perfil;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_perfil WHERE id_perfil = :id_";
        $parametros = array(":id_"=>$this->id_perfil);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_perfil";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}
?>