<?php
include_once('basedatos.php'); 

class tbl_clientes extends basedatos {
    private $id_cliente;
    private $nombre_completo;
    private $celular;
    private $correo;
    private $nombre_usuario;
    private $clave;
    private $tbl_perfil_id_perfil;

    function __construct($id_cliente=NULL, $nombre_completo=NULL, $celular=NULL, $correo=NULL, $nombre_usuario=NULL, $clave=NULL, $tbl_perfil_id_perfil=NULL){
        $this->id_cliente = $id_cliente;
        $this->nombre_completo = $nombre_completo;
        $this->celular = $celular;
        $this->correo = $correo;
        $this->nombre_usuario = $nombre_usuario;
        $this->clave = hash('sha256',$clave);
        $this->clave = $clave;
        $this->tbl_perfil_id_perfil = $tbl_perfil_id_perfil;
        $this->tabla = "tbl_clientes";
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getNombre_completo() {
        return $this->nombre_completo;
    }

    function getCelular() {
        return $this->celular;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getClave() {
        return $this->clave;
    }

    function getTbl_perfil_id_perfil() {
        return $this->tbl_perfil_id_perfil;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setNombre_completo($nombre_completo) {
        $this->nombre_completo = $nombre_completo;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setClave($clave) {
        $this->clave = hash("sha256",$clave);
    }

    function setTbl_perfil_id_perfil($tbl_perfil_id_perfil) {
        $this->tbl_perfil_id_perfil = $tbl_perfil_id_perfil;
    }

    public function insertar(){
        $campos = array("id_cliente", "nombre_completo", "celular", "correo", "nombre_usuario", "clave", "tbl_perfil_id_perfil");
        $valores = array(
            array(
                $this->id_cliente,
                $this->nombre_completo,
                $this->celular,
                $this->correo,
                $this->nombre_usuario,
                $this->clave,
                $this->tbl_perfil_id_perfil
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
        $sql =  "SELECT * FROM tbl_clientes WHERE id_cliente = :id_";
        $parametros = array(":id_"=>$this->id_cliente);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_cliente($res['id_cliente']);
            $this->setNombre_completo($res['nombre_completo']);
            $this->setCelular($res['celular']);
            $this->setCorreo($res['correo']);
            $this->setNombre_usuario($res['nombre_usuario']);
            $this->setClave($res['clave']);
            $this->setTbl_perfil_id_perfil($res['tbl_perfil_id_perfil']);
            $this->desconectar();
        }
    }
    public function consultarPorNombreUsuario(){
        $sql =  "SELECT * FROM tbl_clientes WHERE nombre_usuario = :usu";
        $parametros = array(":usu"=>$this->nombre_usuario);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_cliente($res['id_cliente']);
            $this->setNombre_completo($res['nombre_completo']);
            $this->setCelular($res['celular']);
            $this->setCorreo($res['correo']);
            $this->setNombre_usuario($res['nombre_usuario']);
            $this->setClave($res['clave']);
            $this->setTbl_perfil_id_perfil($res['tbl_perfil_id_perfil']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_cliente", "nombre_completo", "celular", "correo", "nombre_usuario", "clave", "tbl_perfil_id_perfil");
        $valores = array(
            $this->id_cliente,
            $this->nombre_completo,
            $this->celular,
            $this->correo,
            $this->nombre_usuario,
            $this->clave,
            $this->tbl_perfil_id_perfil
        );
        $llaveprimaria = "id_cliente";
        $valorllaveprimaria = $this->id_cliente;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function actualizarPerfil(){
        $campos = array("id_cliente", "nombre_completo", "celular", "correo");
        $valores = array(
            $this->id_cliente,
            $this->nombre_completo,
            $this->celular,
            $this->correo,
        );
        $llaveprimaria = "id_cliente";
        $valorllaveprimaria = $this->id_cliente;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_clientes WHERE id_cliente = :id_";
        $parametros = array(":id_"=>$this->id_cliente);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_clientes";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }

    public function validarSesion(){
        $sql = "SELECT * FROM tbl_clientes WHERE nombre_usuario = :usu and clave = :cla";
        $parametros = array(":usu"=>$this->nombre_usuario, ":cla"=>$this->clave);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->desconectar();
            if($res==NULL){
                return false;
            }else{
                $this->usuario = $res['nombre_usuario'];
                $this->nombre_completo = $res['nombre_completo'];
                return $res;
            }
        }
        $this->desconectar();
        return true;
    }

    public function cambiarClave($nuevaclave){
         $sql =  "UPDATE tbl_clientes SET clave = :cla WHERE id_cliente = :cli";
         $parametros = array(":cla"=>hash('sha256', $nuevaclave), ":cli"=>$this->id_cliente);
       $this->consultaSQL($sql, $parametros);
       $this->desconectar();
     }
}
?>