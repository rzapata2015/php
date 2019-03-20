<?php
include_once('basedatos.php');

class tbl_tipo_dd extends basedatos {
    private $id_tipo_dd;
    private $nombre_tipo_dd;

    function __construct($id_tipo_dd=NULL, $nombre_tipo_dd=NULL){
        $this->id_tipo_dd = $id_tipo_dd;
        $this->nombre_tipo_dd = $nombre_tipo_dd;
        $this->tabla = "tbl_tipo_dd";
    }

    function getId_tipo_dd() {
        return $this->id_tipo_dd;
    }

    function getNombre_tipo_dd() {
        return $this->nombre_tipo_dd;
    }

    function setId_tipo_dd($id_tipo_dd) {
        $this->id_tipo_dd = $id_tipo_dd;
    }

    function setNombre_tipo_dd($nombre_tipo_dd) {
        $this->nombre_tipo_dd = $nombre_tipo_dd;
    }

    public function insertar(){
        $campos = array("id_tipo_dd", "nombre_tipo_dd");
        $valores = array(
            array(
                $this->id_tipo_dd,
                $this->nombre_tipo_dd
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
        $sql =  "SELECT * FROM tbl_tipo_dd WHERE id_tipo_dd = :id_";
        $parametros = array(":id_"=>$this->id_tipo_dd);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_tipo_dd($res['id_tipo_dd']);
            $this->setNombre_tipo_dd($res['nombre_tipo_dd']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_tipo_dd", "nombre_tipo_dd");
        $valores = array(
            $this->id_tipo_dd,
            $this->nombre_tipo_dd
        );
        $llaveprimaria = "id_tipo_dd";
        $valorllaveprimaria = $this->id_tipo_dd;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_tipo_dd WHERE id_tipo_dd = :id_";
        $parametros = array(":id_"=>$this->id_tipo_dd);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_tipo_dd";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}
?>