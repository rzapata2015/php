<?php
include_once('basedatos.php');

class tbl_tipo_monitor extends basedatos {
    private $id_tipo_monitor;
    private $nombre_tipo_monitor;

    function __construct($id_tipo_monitor=NULL, $nombre_tipo_monitor=NULL){
        $this->id_tipo_monitor = $id_tipo_monitor;
        $this->nombre_tipo_monitor = $nombre_tipo_monitor;
        $this->tabla = "tbl_tipo_monitor";
    }

    function getId_tipo_monitor() {
        return $this->id_tipo_monitor;
    }

    function getNombre_tipo_monitor() {
        return $this->nombre_tipo_monitor;
    }

    function setId_tipo_monitor($id_tipo_monitor) {
        $this->id_tipo_monitor = $id_tipo_monitor;
    }

    function setNombre_tipo_monitor($nombre_tipo_monitor) {
        $this->nombre_tipo_monitor = $nombre_tipo_monitor;
    }

    public function insertar(){
        $campos = array("id_tipo_monitor", "nombre_tipo_monitor");
        $valores = array(
            array(
                $this->id_tipo_monitor,
                $this->nombre_tipo_monitor
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
        $sql =  "SELECT * FROM tbl_tipo_monitor WHERE id_tipo_monitor = :id_";
        $parametros = array(":id_"=>$this->id_tipo_monitor);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_tipo_monitor($res['id_tipo_monitor']);
            $this->setNombre_tipo_monitor($res['nombre_tipo_monitor']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_tipo_monitor", "nombre_tipo_monitor");
        $valores = array(
            $this->id_tipo_monitor,
            $this->nombre_tipo_monitor
        );
        $llaveprimaria = "id_tipo_monitor";
        $valorllaveprimaria = $this->id_tipo_monitor;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_tipo_monitor WHERE id_tipo_monitor = :id_";
        $parametros = array(":id_"=>$this->id_tipo_monitor);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_tipo_monitor";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}
?>