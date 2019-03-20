<?php
include_once('basedatos.php');

class tbl_marcas extends basedatos {
    private $id_marca;
    private $nombre_marca;

    function __construct($id_marca=NULL, $nombre_marca=NULL){
        $this->id_marca = $id_marca;
        $this->nombre_marca = $nombre_marca;
        $this->tabla = "tbl_marcas";
    }

    function getId_marca() {
        return $this->id_marca;
    }

    function getNombre_marca() {
        return $this->nombre_marca;
    }

    function setId_marca($id_marca) {
        $this->id_marca = $id_marca;
    }

    function setNombre_marca($nombre_marca) {
        $this->nombre_marca = $nombre_marca;
    }

    public function insertar(){
        $campos = array("id_marca", "nombre_marca");
        $valores = array(
            array(
                $this->id_marca,
                $this->nombre_marca
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
        $sql =  "SELECT * FROM tbl_marcas WHERE id_marca = :id_";
        $parametros = array(":id_"=>$this->id_marca);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_marca($res['id_marca']);
            $this->setNombre_marca($res['nombre_marca']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_marca", "nombre_marca");
        $valores = array(
            $this->id_marca,
            $this->nombre_marca
        );
        $llaveprimaria = "id_marca";
        $valorllaveprimaria = $this->id_marca;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_marcas WHERE id_marca = :id_";
        $parametros = array(":id_"=>$this->id_marca);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_marcas";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}
?>