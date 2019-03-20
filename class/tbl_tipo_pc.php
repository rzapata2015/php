<?php
include_once('basedatos.php');

class tbl_tipo_pc extends basedatos {
    private $id_tipo_pc;
    private $nombre_tipo_pc;

    function __construct($id_tipo_pc=NULL, $nombre_tipo_pc=NULL){
        $this->id_tipo_pc = $id_tipo_pc;
        $this->nombre_tipo_pc = $nombre_tipo_pc;
        $this->tabla = "tbl_tipo_pc";
    }

    function getId_tipo_pc() {
        return $this->id_tipo_pc;
    }

    function getNombre_tipo_pc() {
        return $this->nombre_tipo_pc;
    }

    function setId_tipo_pc($id_tipo_pc) {
        $this->id_tipo_pc = $id_tipo_pc;
    }

    function setNombre_tipo_pc($nombre_tipo_pc) {
        $this->nombre_tipo_pc = $nombre_tipo_pc;
    }

    public function insertar(){
        $campos = array("id_tipo_pc", "nombre_tipo_pc");
        $valores = array(
            array(
                $this->id_tipo_pc,
                $this->nombre_tipo_pc
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
        $sql =  "SELECT * FROM tbl_tipo_pc WHERE id_tipo_pc = :id_";
        $parametros = array(":id_"=>$this->id_tipo_pc);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_tipo_pc($res['id_tipo_pc']);
            $this->setNombre_tipo_pc($res['nombre_tipo_pc']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_tipo_pc", "nombre_tipo_pc");
        $valores = array(
            $this->id_tipo_pc,
            $this->nombre_tipo_pc
        );
        $llaveprimaria = "id_tipo_pc";
        $valorllaveprimaria = $this->id_tipo_pc;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_tipo_pc WHERE id_tipo_pc = :id_";
        $parametros = array(":id_"=>$this->id_tipo_pc);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_tipo_pc";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}
?>