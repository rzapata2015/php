<?php
include_once('basedatos.php');

class tbl_tipo_ram extends basedatos {
    private $id_tipo_ram;
    private $nombre_tipo_ram;

    function __construct($id_tipo_ram=NULL, $nombre_tipo_ram=NULL){
        $this->id_tipo_ram = $id_tipo_ram;
        $this->nombre_tipo_ram = $nombre_tipo_ram;
        $this->tabla = "tbl_tipo_ram";
    }

    function getId_tipo_ram() {
        return $this->id_tipo_ram;
    }

    function getNombre_tipo_ram() {
        return $this->nombre_tipo_ram;
    }

    function setId_tipo_ram($id_tipo_ram) {
        $this->id_tipo_ram = $id_tipo_ram;
    }

    function setNombre_tipo_ram($nombre_tipo_ram) {
        $this->nombre_tipo_ram = $nombre_tipo_ram;
    }

    public function insertar(){
        $campos = array("id_tipo_ram", "nombre_tipo_ram");
        $valores = array(
            array(
                $this->id_tipo_ram,
                $this->nombre_tipo_ram
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
        $sql =  "SELECT * FROM tbl_tipo_ram WHERE id_tipo_ram = :id_";
        $parametros = array(":id_"=>$this->id_tipo_ram);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_tipo_ram($res['id_tipo_ram']);
            $this->setNombre_tipo_ram($res['nombre_tipo_ram']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_tipo_ram", "nombre_tipo_ram");
        $valores = array(
            $this->id_tipo_ram,
            $this->nombre_tipo_ram
        );
        $llaveprimaria = "id_tipo_ram";
        $valorllaveprimaria = $this->id_tipo_ram;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_tipo_ram WHERE id_tipo_ram = :id_";
        $parametros = array(":id_"=>$this->id_tipo_ram);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_tipo_ram";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}
?>