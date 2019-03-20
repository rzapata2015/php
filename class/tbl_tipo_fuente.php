<?php
include_once('basedatos.php');

class tbl_tipo_fuente extends basedatos {
    private $id_tipo_fuente;
    private $nombre_fuente_poder;

    function __construct($id_tipo_fuente=NULL, $nombre_fuente_poder=NULL){
        $this->id_tipo_fuente = $id_tipo_fuente;
        $this->nombre_fuente_poder = $nombre_fuente_poder;
        $this->tabla = "tbl_tipo_fuente";
    }

    function getId_tipo_fuente() {
        return $this->id_tipo_fuente;
    }

    function getNombre_fuente_poder() {
        return $this->nombre_fuente_poder;
    }

    function setId_tipo_fuente($id_tipo_fuente) {
        $this->id_tipo_fuente = $id_tipo_fuente;
    }

    function setNombre_fuente_poder($nombre_fuente_poder) {
        $this->nombre_fuente_poder = $nombre_fuente_poder;
    }

    public function insertar(){
        $campos = array("id_tipo_fuente", "nombre_fuente_poder");
        $valores = array(
            array(
                $this->id_tipo_fuente,
                $this->nombre_fuente_poder
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
        $sql =  "SELECT * FROM tbl_tipo_fuente WHERE id_tipo_fuente = :id_";
        $parametros = array(":id_"=>$this->id_tipo_fuente);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_tipo_fuente($res['id_tipo_fuente']);
            $this->setNombre_fuente_poder($res['nombre_fuente_poder']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_tipo_fuente", "nombre_fuente_poder");
        $valores = array(
            $this->id_tipo_fuente,
            $this->nombre_fuente_poder
        );
        $llaveprimaria = "id_tipo_fuente";
        $valorllaveprimaria = $this->id_tipo_fuente;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_tipo_fuente WHERE id_tipo_fuente = :id_";
        $parametros = array(":id_"=>$this->id_tipo_fuente);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_tipo_fuente";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}
?>