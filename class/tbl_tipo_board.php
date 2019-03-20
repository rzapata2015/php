<?php
include_once('basedatos.php');

class tbl_tipo_board extends basedatos {
    private $id_tipo_board;
    private $nombre_tipo_board;

    function __construct($id_tipo_board=NULL, $nombre_tipo_board=NULL){
        $this->id_tipo_board = $id_tipo_board;
        $this->nombre_tipo_board = $nombre_tipo_board;
        $this->tabla = "tbl_tipo_board";
    }

    function getId_tipo_board() {
        return $this->id_tipo_board;
    }

    function getNombre_tipo_board() {
        return $this->nombre_tipo_board;
    }

    function setId_tipo_board($id_tipo_board) {
        $this->id_tipo_board = $id_tipo_board;
    }

    function setNombre_tipo_board($nombre_tipo_board) {
        $this->nombre_tipo_board = $nombre_tipo_board;
    }

    public function insertar(){
        $campos = array("id_tipo_board", "nombre_tipo_board");
        $valores = array(
            array(
                $this->id_tipo_board,
                $this->nombre_tipo_board
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
        $sql =  "SELECT * FROM tbl_tipo_board WHERE id_tipo_board = :id_";
        $parametros = array(":id_"=>$this->id_tipo_board);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_tipo_board($res['id_tipo_board']);
            $this->setNombre_tipo_board($res['nombre_tipo_board']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_tipo_board", "nombre_tipo_board");
        $valores = array(
            $this->id_tipo_board,
            $this->nombre_tipo_board
        );
        $llaveprimaria = "id_tipo_board";
        $valorllaveprimaria = $this->id_tipo_board;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_tipo_board WHERE id_tipo_board = :id_";
        $parametros = array(":id_"=>$this->id_tipo_board);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_tipo_board";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}
?>