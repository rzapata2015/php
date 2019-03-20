<?php
include_once('basedatos.php');

class empleados extends basedatos {
    private $id_empleado;
    private $cedula;
    private $nombre_completo;
    private $correo;
    private $celular;
    private $direccion;
    private $usuario; 
    private $clave;
    private $perfil_id;
    //private $foto;

    function __construct($id_empleado=NULL, $cedula=NULL, $nombre_completo=NULL, $correo=NULL, $celular=NULL, $direccion=NULL, $usuario=NULL, $clave=NULL, $foto=NULL, $perfil_id=NULL){
        $this->id_empleado = $id_empleado;
        $this->cedula = $cedula;
        $this->nombre_completo = $nombre_completo;
        $this->correo = $correo;
        $this->celular = $celular;
        $this->direccion = $direccion;
        $this->usuario = $usuario;
        $this->clave = hash('sha256',$clave);
        $this->foto = $foto;
        $this->perfil_id = $perfil_id;
        $this->tabla = "empleados";
    }

    function getId_empleado() {
        return $this->id_empleado;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNombre_completo() {
        return $this->nombre_completo;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getCelular() {
        return $this->celular;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getClave() {
        return $this->clave;
    }

    function getFoto() {
        return $this->foto;
    }

    function getPerfilId() {
        return $this->perfil_id;
    }

    function setId_empleado($id_empleado) {
        $this->id_empleado = $id_empleado;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombre_completo($nombre_completo) {
        $this->nombre_completo = $nombre_completo;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setClave($clave) {
        $this->clave = hash('sha256',$clave);
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setPerfilId($perfil_id) {
        $this->perfil_id = $perfil_id;
    }

    public function insertar(){
        $campos = array("id_empleado", "cedula", "nombre_completo", "correo", "celular", "direccion", "usuario", "clave", "perfil_id");
        $valores = array(
            array(
                $this->id_empleado,
                $this->cedula,
                $this->nombre_completo,
                $this->correo,
                $this->celular,
                $this->direccion,
                $this->usuario,
                $this->clave,
                $this->perfil_id
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
        $sql =  "SELECT * FROM empleados WHERE id_empleado = :id_";
        $parametros = array(":id_"=>$this->id_empleado);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_empleado($res['id_empleado']);
            $this->setCedula($res['cedula']);
            $this->setNombre_completo($res['nombre_completo']);
            $this->setCorreo($res['correo']);
            $this->setCelular($res['celular']);
            $this->setDireccion($res['direccion']);
            $this->setUsuario($res['usuario']);
            $this->setClave($res['clave']); 
            $this->setFoto($res['foto']);
            $this->setPerfilId($res['perfil_id']);
            $this->desconectar();
        }
    }

    public function consultarPorNombreUsuario(){
        $sql =  "SELECT * FROM empleados WHERE usuario = :usu";
        $parametros = array(":usu"=>$this->usuario);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_empleado($res['id_empleado']);
            $this->setCedula($res['cedula']);
            $this->setNombre_completo($res['nombre_completo']);
            $this->setCorreo($res['correo']);
            $this->setCelular($res['celular']);
            $this->setDireccion($res['direccion']);
            $this->setUsuario($res['usuario']);
            $this->setClave($res['clave']);
            $this->setFoto($res['foto']);
            $this->setPerfilId($res['perfil_id']);
            $this->desconectar();
        }
    }


    public function actualizar(){
        $campos = array("cedula", "nombre_completo", "correo", "celular", "direccion", "perfil_id");
        $valores = array(
            $this->cedula,
            $this->nombre_completo,
            $this->correo,
            $this->celular,
            $this->direccion,
            $this->perfil_id,
            //$this->usuario,
            //$this->foto
        );
        $llaveprimaria = "id_empleado";
        $valorllaveprimaria = $this->id_empleado;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }

    public function actualizarPerfil(){
        $campos = array("cedula", "nombre_completo", "correo", "celular", "direccion");
        $valores = array(
            $this->cedula,
            $this->nombre_completo,
            $this->correo,
            $this->celular,
            $this->direccion
        );
        $llaveprimaria = "id_empleado";
        $valorllaveprimaria = $this->id_empleado;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }

    public function eliminar(){
        $sql = "DELETE FROM empleados WHERE id_empleado = :id_";
        $parametros = array(":id_"=>$this->id_empleado);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM empleados";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }

    public function validarSesion(){
        $sql = "SELECT * FROM empleados WHERE usuario = :usu and clave = :cla";
        $parametros = array(":usu"=>$this->usuario, ":cla"=>$this->clave);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->desconectar();
            if($res==NULL){
                return false;
            }else{
                $this->usuario = $res['usuario'];
                $this->nombre_completo = $res['nombre_completo'];
                return $res;
            }
        }
        $this->desconectar();
        return true;
    }

    public function cambiarClave($nuevaclave){
         $sql =  "UPDATE empleados SET clave = :cla WHERE id_empleado = :emp";
         $parametros = array(":cla"=>hash('sha256', $nuevaclave), ":emp"=>$this->id_empleado);
       $this->consultaSQL($sql, $parametros);
       $this->desconectar();
     }

}
?>