<?php
include_once('basedatos.php');

class tbl_dependencias extends basedatos {
    private $id_dependencia;
    private $nombre_dependencia;

    function __construct($id_dependencia=NULL, $nombre_dependencia=NULL){
        $this->id_dependencia = $id_dependencia;
        $this->nombre_dependencia = $nombre_dependencia;
        $this->tabla = "tbl_dependencias";
    }

    function getId_dependencia() {
        return $this->id_dependencia;
    }

    function getNombre_dependencia() {
        return $this->nombre_dependencia;
    }

    function setId_dependencia($id_dependencia) {
        $this->id_dependencia = $id_dependencia;
    }

    function setNombre_dependencia($nombre_dependencia) {
        $this->nombre_dependencia = $nombre_dependencia;
    }

    public function insertar(){
        $campos = array("id_dependencia", "nombre_dependencia");
        $valores = array(
            array(
                $this->id_dependencia,
                $this->nombre_dependencia
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
        $sql =  "SELECT * FROM tbl_dependencias WHERE id_dependencia = :id_";
        $parametros = array(":id_"=>$this->id_dependencia);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_dependencia($res['id_dependencia']);
            $this->setNombre_dependencia($res['nombre_dependencia']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_dependencia", "nombre_dependencia");
        $valores = array(
            $this->id_dependencia,
            $this->nombre_dependencia
        );
        $llaveprimaria = "id_dependencia";
        $valorllaveprimaria = $this->id_dependencia;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_dependencias WHERE id_dependencia = :id_";
        $parametros = array(":id_"=>$this->id_dependencia);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_dependencias";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}
?>