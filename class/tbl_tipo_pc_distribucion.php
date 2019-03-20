<?php
include_once('basedatos.php');

class tbl_tipo_pc_distribucion extends basedatos {
    private $id_tipo_pc_distribucion;
    private $nombre_tipo_distribucion;

    function __construct($id_tipo_pc_distribucion=NULL, $nombre_tipo_distribucion=NULL){
        $this->id_tipo_pc_distribucion = $id_tipo_pc_distribucion;
        $this->nombre_tipo_distribucion = $nombre_tipo_distribucion;
        $this->tabla = "tbl_tipo_pc_distribucion";
    }

    function getId_tipo_pc_distribucion() {
        return $this->id_tipo_pc_distribucion;
    }

    function getNombre_tipo_distribucion() {
        return $this->nombre_tipo_distribucion;
    }

    function setId_tipo_pc_distribucion($id_tipo_pc_distribucion) {
        $this->id_tipo_pc_distribucion = $id_tipo_pc_distribucion;
    }

    function setNombre_tipo_distribucion($nombre_tipo_distribucion) {
        $this->nombre_tipo_distribucion = $nombre_tipo_distribucion;
    }

    public function insertar(){
        $campos = array("id_tipo_pc_distribucion", "nombre_tipo_distribucion");
        $valores = array(
            array(
                $this->id_tipo_pc_distribucion,
                $this->nombre_tipo_distribucion
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
        $sql =  "SELECT * FROM tbl_tipo_pc_distribucion WHERE id_tipo_pc_distribucion = :id_";
        $parametros = array(":id_"=>$this->id_tipo_pc_distribucion);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_tipo_pc_distribucion($res['id_tipo_pc_distribucion']);
            $this->setNombre_tipo_distribucion($res['nombre_tipo_distribucion']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_tipo_pc_distribucion", "nombre_tipo_distribucion");
        $valores = array(
            $this->id_tipo_pc_distribucion,
            $this->nombre_tipo_distribucion
        );
        $llaveprimaria = "id_tipo_pc_distribucion";
        $valorllaveprimaria = $this->id_tipo_pc_distribucion;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_tipo_pc_distribucion WHERE id_tipo_pc_distribucion = :id_";
        $parametros = array(":id_"=>$this->id_tipo_pc_distribucion);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_tipo_pc_distribucion";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}
?>