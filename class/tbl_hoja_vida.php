<?php
include_once('basedatos.php');

class tbl_hoja_vida extends basedatos {
    private $id_hoja_vida;
    private $tbl_dependencias_id_dependencia;
    private $equipo_numero;
    private $tbl_marcas_id_marca;
    private $tbl_tipo_pc_id_tipo_pc;
    private $fecha_compra;
    private $valor;
    private $fecha_expiracion_garantia;
    private $fecha_registrado;
    private $tbl_tipo_pc_distribucion_id_tipo_pc_distribucion;
    private $manija;
    private $panel_frontal;
    private $iluminacion;
    private $unidades_opticas;
    private $lector_multitarjetas;
    private $cantidad_puertos_usb;
    private $puertos_video;
    private $ethernet;
    private $plug_audio;
    private $cantidad_ps2;
    private $otros_puertos;
    private $tbl_tipo_board_id_tipo_board;
    private $tbl_tipo_fuente_id_tipo_fuente;
    private $marca_fuente;
    private $modelo_fuente;
    private $voltaje_fuente;
    private $watt_fuente;
    private $tamano_monitor;
    private $marca_monitor;
    private $tbl_tipo_monitor_id_tipo_monitor;
    private $marca_dd;
    private $capacidad_dd;
    private $serial_dd;
    private $tbl_tipo_dd_id_tipo_dd;
    private $marca_board;
    private $serie_board;
    private $capacidad_ram;
    private $tbl_tipo_ram_id_tipo_ram;
    private $velocidad_ram;
    private $ramas_expansion;
    private $tarjetas_expansion;
    private $foto;
    private $software;
    private $observaciones;
    private $tbl_clientes_id_cliente;

    function __construct($id_hoja_vida=NULL, $tbl_dependencias_id_dependencia=NULL, $equipo_numero=NULL, $tbl_marcas_id_marca=NULL, $tbl_tipo_pc_id_tipo_pc=NULL, $fecha_compra=NULL, $valor=NULL, $fecha_expiracion_garantia=NULL, $fecha_registrado=NULL, $tbl_tipo_pc_distribucion_id_tipo_pc_distribucion=NULL, $manija=NULL, $panel_frontal=NULL, $iluminacion=NULL, $unidades_opticas=NULL, $lector_multitarjetas=NULL, $cantidad_puertos_usb=NULL, $puertos_video=NULL, $ethernet=NULL, $plug_audio=NULL, $cantidad_ps2=NULL, $otros_puertos=NULL, $tbl_tipo_board_id_tipo_board=NULL, $tbl_tipo_fuente_id_tipo_fuente=NULL, $marca_fuente=NULL, $modelo_fuente=NULL, $voltaje_fuente=NULL, $watt_fuente=NULL, $tamano_monitor=NULL, $marca_monitor=NULL, $tbl_tipo_monitor_id_tipo_monitor=NULL, $marca_dd=NULL, $capacidad_dd=NULL, $serial_dd=NULL, $tbl_tipo_dd_id_tipo_dd=NULL, $marca_board=NULL, $serie_board=NULL, $capacidad_ram=NULL, $tbl_tipo_ram_id_tipo_ram=NULL, $velocidad_ram=NULL, $ramas_expansion=NULL, $tarjetas_expansion=NULL, $foto=NULL, $software=NULL, $observaciones=NULL, $tbl_clientes_id_cliente=NULL){
        $this->id_hoja_vida = $id_hoja_vida;
        $this->tbl_dependencias_id_dependencia = $tbl_dependencias_id_dependencia;
        $this->equipo_numero = $equipo_numero;
        $this->tbl_marcas_id_marca = $tbl_marcas_id_marca;
        $this->tbl_tipo_pc_id_tipo_pc = $tbl_tipo_pc_id_tipo_pc;
        $this->fecha_compra = $fecha_compra;
        $this->valor = $valor;
        $this->fecha_expiracion_garantia = $fecha_expiracion_garantia;
        $this->fecha_registrado = $fecha_registrado;
        $this->tbl_tipo_pc_distribucion_id_tipo_pc_distribucion = $tbl_tipo_pc_distribucion_id_tipo_pc_distribucion;
        $this->manija = $manija;
        $this->panel_frontal = $panel_frontal;
        $this->iluminacion = $iluminacion;
        $this->unidades_opticas = $unidades_opticas;
        $this->lector_multitarjetas = $lector_multitarjetas;
        $this->cantidad_puertos_usb = $cantidad_puertos_usb;
        $this->puertos_video = $puertos_video;
        $this->ethernet = $ethernet;
        $this->plug_audio = $plug_audio;
        $this->cantidad_ps2 = $cantidad_ps2;
        $this->otros_puertos = $otros_puertos;
        $this->tbl_tipo_board_id_tipo_board = $tbl_tipo_board_id_tipo_board;
        $this->tbl_tipo_fuente_id_tipo_fuente = $tbl_tipo_fuente_id_tipo_fuente;
        $this->marca_fuente = $marca_fuente;
        $this->modelo_fuente = $modelo_fuente;
        $this->voltaje_fuente = $voltaje_fuente;
        $this->watt_fuente = $watt_fuente;
        $this->tamano_monitor = $tamano_monitor;
        $this->marca_monitor = $marca_monitor;
        $this->tbl_tipo_monitor_id_tipo_monitor = $tbl_tipo_monitor_id_tipo_monitor;
        $this->marca_dd = $marca_dd;
        $this->capacidad_dd = $capacidad_dd;
        $this->serial_dd = $serial_dd;
        $this->tbl_tipo_dd_id_tipo_dd = $tbl_tipo_dd_id_tipo_dd;
        $this->marca_board = $marca_board;
        $this->serie_board = $serie_board;
        $this->capacidad_ram = $capacidad_ram;
        $this->tbl_tipo_ram_id_tipo_ram = $tbl_tipo_ram_id_tipo_ram;
        $this->velocidad_ram = $velocidad_ram;
        $this->ramas_expansion = $ramas_expansion;
        $this->tarjetas_expansion = $tarjetas_expansion;
        $this->foto = $foto;
        $this->software = $software;
        $this->observaciones = $observaciones;
        $this->tbl_clientes_id_cliente = $tbl_clientes_id_cliente;
        $this->tabla = "tbl_hoja_vida";
    }

    function getId_hoja_vida() {
        return $this->id_hoja_vida;
    }

    function getTbl_dependencias_id_dependencia() {
        return $this->tbl_dependencias_id_dependencia;
    }

    function getEquipo_numero() {
        return $this->equipo_numero;
    }

    function getTbl_marcas_id_marca() {
        return $this->tbl_marcas_id_marca;
    }

    function getTbl_tipo_pc_id_tipo_pc() {
        return $this->tbl_tipo_pc_id_tipo_pc;
    }

    function getFecha_compra() {
        return $this->fecha_compra;
    }

    function getValor() {
        return $this->valor;
    }

    function getFecha_expiracion_garantia() {
        return $this->fecha_expiracion_garantia;
    }

    function getFecha_registrado() {
        return $this->fecha_registrado;
    }

    function getTbl_tipo_pc_distribucion_id_tipo_pc_distribucion() {
        return $this->tbl_tipo_pc_distribucion_id_tipo_pc_distribucion;
    }

    function getManija() {
        return $this->manija;
    }

    function getPanel_frontal() {
        return $this->panel_frontal;
    }

    function getIluminacion() {
        return $this->iluminacion;
    }

    function getUnidades_opticas() {
        return $this->unidades_opticas;
    }

    function getLector_multitarjetas() {
        return $this->lector_multitarjetas;
    }

    function getCantidad_puertos_usb() {
        return $this->cantidad_puertos_usb;
    }

    function getPuertos_video() {
        return $this->puertos_video;
    }

    function getEthernet() {
        return $this->ethernet;
    }

    function getPlug_audio() {
        return $this->plug_audio;
    }

    function getCantidad_ps2() {
        return $this->cantidad_ps2;
    }

    function getOtros_puertos() {
        return $this->otros_puertos;
    }

    function getTbl_tipo_board_id_tipo_board() {
        return $this->tbl_tipo_board_id_tipo_board;
    }

    function getTbl_tipo_fuente_id_tipo_fuente() {
        return $this->tbl_tipo_fuente_id_tipo_fuente;
    }

    function getMarca_fuente() {
        return $this->marca_fuente;
    }

    function getModelo_fuente() {
        return $this->modelo_fuente;
    }

    function getVoltaje_fuente() {
        return $this->voltaje_fuente;
    }

    function getWatt_fuente() {
        return $this->watt_fuente;
    }

    function getTamano_monitor() {
        return $this->tamano_monitor;
    }

    function getMarca_monitor() {
        return $this->marca_monitor;
    }

    function getTbl_tipo_monitor_id_tipo_monitor() {
        return $this->tbl_tipo_monitor_id_tipo_monitor;
    }

    function getMarca_dd() {
        return $this->marca_dd;
    }

    function getCapacidad_dd() {
        return $this->capacidad_dd;
    }

    function getSerial_dd() {
        return $this->serial_dd;
    }

    function getTbl_tipo_dd_id_tipo_dd() {
        return $this->tbl_tipo_dd_id_tipo_dd;
    }

    function getMarca_board() {
        return $this->marca_board;
    }

    function getSerie_board() {
        return $this->serie_board;
    }

    function getCapacidad_ram() {
        return $this->capacidad_ram;
    }

    function getTbl_tipo_ram_id_tipo_ram() {
        return $this->tbl_tipo_ram_id_tipo_ram;
    }

    function getVelocidad_ram() {
        return $this->velocidad_ram;
    }

    function getRamas_expansion() {
        return $this->ramas_expansion;
    }

    function getTarjetas_expansion() {
        return $this->tarjetas_expansion;
    }

    function getFoto() {
        return $this->foto;
    }

    function getSoftware() {
        return $this->software;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function getTbl_clientes_id_cliente() {
        return $this->tbl_clientes_id_cliente;
    }

    function setId_hoja_vida($id_hoja_vida) {
        $this->id_hoja_vida = $id_hoja_vida;
    }

    function setTbl_dependencias_id_dependencia($tbl_dependencias_id_dependencia) {
        $this->tbl_dependencias_id_dependencia = $tbl_dependencias_id_dependencia;
    }

    function setEquipo_numero($equipo_numero) {
        $this->equipo_numero = $equipo_numero;
    }

    function setTbl_marcas_id_marca($tbl_marcas_id_marca) {
        $this->tbl_marcas_id_marca = $tbl_marcas_id_marca;
    }

    function setTbl_tipo_pc_id_tipo_pc($tbl_tipo_pc_id_tipo_pc) {
        $this->tbl_tipo_pc_id_tipo_pc = $tbl_tipo_pc_id_tipo_pc;
    }

    function setFecha_compra($fecha_compra) {
        $this->fecha_compra = $fecha_compra;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setFecha_expiracion_garantia($fecha_expiracion_garantia) {
        $this->fecha_expiracion_garantia = $fecha_expiracion_garantia;
    }

    function setFecha_registrado($fecha_registrado) {
        $this->fecha_registrado = $fecha_registrado;
    }

    function setTbl_tipo_pc_distribucion_id_tipo_pc_distribucion($tbl_tipo_pc_distribucion_id_tipo_pc_distribucion) {
        $this->tbl_tipo_pc_distribucion_id_tipo_pc_distribucion = $tbl_tipo_pc_distribucion_id_tipo_pc_distribucion;
    }

    function setManija($manija) {
        $this->manija = $manija;
    }

    function setPanel_frontal($panel_frontal) {
        $this->panel_frontal = $panel_frontal;
    }

    function setIluminacion($iluminacion) {
        $this->iluminacion = $iluminacion;
    }

    function setUnidades_opticas($unidades_opticas) {
        $this->unidades_opticas = $unidades_opticas;
    }

    function setLector_multitarjetas($lector_multitarjetas) {
        $this->lector_multitarjetas = $lector_multitarjetas;
    }

    function setCantidad_puertos_usb($cantidad_puertos_usb) {
        $this->cantidad_puertos_usb = $cantidad_puertos_usb;
    }

    function setPuertos_video($puertos_video) {
        $this->puertos_video = $puertos_video;
    }

    function setEthernet($ethernet) {
        $this->ethernet = $ethernet;
    }

    function setPlug_audio($plug_audio) {
        $this->plug_audio = $plug_audio;
    }

    function setCantidad_ps2($cantidad_ps2) {
        $this->cantidad_ps2 = $cantidad_ps2;
    }

    function setOtros_puertos($otros_puertos) {
        $this->otros_puertos = $otros_puertos;
    }

    function setTbl_tipo_board_id_tipo_board($tbl_tipo_board_id_tipo_board) {
        $this->tbl_tipo_board_id_tipo_board = $tbl_tipo_board_id_tipo_board;
    }

    function setTbl_tipo_fuente_id_tipo_fuente($tbl_tipo_fuente_id_tipo_fuente) {
        $this->tbl_tipo_fuente_id_tipo_fuente = $tbl_tipo_fuente_id_tipo_fuente;
    }

    function setMarca_fuente($marca_fuente) {
        $this->marca_fuente = $marca_fuente;
    }

    function setModelo_fuente($modelo_fuente) {
        $this->modelo_fuente = $modelo_fuente;
    }

    function setVoltaje_fuente($voltaje_fuente) {
        $this->voltaje_fuente = $voltaje_fuente;
    }

    function setWatt_fuente($watt_fuente) {
        $this->watt_fuente = $watt_fuente;
    }

    function setTamano_monitor($tamano_monitor) {
        $this->tamano_monitor = $tamano_monitor;
    }

    function setMarca_monitor($marca_monitor) {
        $this->marca_monitor = $marca_monitor;
    }

    function setTbl_tipo_monitor_id_tipo_monitor($tbl_tipo_monitor_id_tipo_monitor) {
        $this->tbl_tipo_monitor_id_tipo_monitor = $tbl_tipo_monitor_id_tipo_monitor;
    }

    function setMarca_dd($marca_dd) {
        $this->marca_dd = $marca_dd;
    }

    function setCapacidad_dd($capacidad_dd) {
        $this->capacidad_dd = $capacidad_dd;
    }

    function setSerial_dd($serial_dd) {
        $this->serial_dd = $serial_dd;
    }

    function setTbl_tipo_dd_id_tipo_dd($tbl_tipo_dd_id_tipo_dd) {
        $this->tbl_tipo_dd_id_tipo_dd = $tbl_tipo_dd_id_tipo_dd;
    }

    function setMarca_board($marca_board) {
        $this->marca_board = $marca_board;
    }

    function setSerie_board($serie_board) {
        $this->serie_board = $serie_board;
    }

    function setCapacidad_ram($capacidad_ram) {
        $this->capacidad_ram = $capacidad_ram;
    }

    function setTbl_tipo_ram_id_tipo_ram($tbl_tipo_ram_id_tipo_ram) {
        $this->tbl_tipo_ram_id_tipo_ram = $tbl_tipo_ram_id_tipo_ram;
    }

    function setVelocidad_ram($velocidad_ram) {
        $this->velocidad_ram = $velocidad_ram;
    }

    function setRamas_expansion($ramas_expansion) {
        $this->ramas_expansion = $ramas_expansion;
    }

    function setTarjetas_expansion($tarjetas_expansion) {
        $this->tarjetas_expansion = $tarjetas_expansion;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setSoftware($software) {
        $this->software = $software;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    function setTbl_clientes_id_cliente($tbl_clientes_id_cliente) {
        $this->tbl_clientes_id_cliente = $tbl_clientes_id_cliente;
    }

    public function insertar(){
        $campos = array("id_hoja_vida", "tbl_dependencias_id_dependencia", "equipo_numero", "tbl_marcas_id_marca", "tbl_tipo_pc_id_tipo_pc", "fecha_compra", "valor", "fecha_expiracion_garantia", "fecha_registrado", "tbl_tipo_pc_distribucion_id_tipo_pc_distribucion", "manija", "panel_frontal", "iluminacion", "unidades_opticas", "lector_multitarjetas", "cantidad_puertos_usb", "puertos_video", "ethernet", "plug_audio", "cantidad_ps2", "otros_puertos", "tbl_tipo_board_id_tipo_board", "tbl_tipo_fuente_id_tipo_fuente", "marca_fuente", "modelo_fuente", "voltaje_fuente", "watt_fuente", "tamano_monitor", "marca_monitor", "tbl_tipo_monitor_id_tipo_monitor", "marca_dd", "capacidad_dd", "serial_dd", "tbl_tipo_dd_id_tipo_dd", "marca_board", "serie_board", "capacidad_ram", "tbl_tipo_ram_id_tipo_ram", "velocidad_ram", "ramas_expansion", "tarjetas_expansion", "software", "observaciones", "tbl_clientes_id_cliente");
        $valores = array(
            array(
                $this->id_hoja_vida,
                $this->tbl_dependencias_id_dependencia,
                $this->equipo_numero,
                $this->tbl_marcas_id_marca,
                $this->tbl_tipo_pc_id_tipo_pc,
                $this->fecha_compra,
                $this->valor,
                $this->fecha_expiracion_garantia,
                $this->fecha_registrado,
                $this->tbl_tipo_pc_distribucion_id_tipo_pc_distribucion,
                $this->manija,
                $this->panel_frontal,
                $this->iluminacion,
                $this->unidades_opticas,
                $this->lector_multitarjetas,
                $this->cantidad_puertos_usb,
                $this->puertos_video,
                $this->ethernet,
                $this->plug_audio,
                $this->cantidad_ps2,
                $this->otros_puertos,
                $this->tbl_tipo_board_id_tipo_board,
                $this->tbl_tipo_fuente_id_tipo_fuente,
                $this->marca_fuente,
                $this->modelo_fuente,
                $this->voltaje_fuente,
                $this->watt_fuente,
                $this->tamano_monitor,
                $this->marca_monitor,
                $this->tbl_tipo_monitor_id_tipo_monitor,
                $this->marca_dd,
                $this->capacidad_dd,
                $this->serial_dd,
                $this->tbl_tipo_dd_id_tipo_dd,
                $this->marca_board,
                $this->serie_board,
                $this->capacidad_ram,
                $this->tbl_tipo_ram_id_tipo_ram,
                $this->velocidad_ram,
                $this->ramas_expansion,
                $this->tarjetas_expansion,
                $this->software,
                $this->observaciones,
                $this->tbl_clientes_id_cliente
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
        $sql =  "SELECT * FROM tbl_hoja_vida WHERE id_hoja_vida = :id_";
        $parametros = array(":id_"=>$this->id_hoja_vida);
        if($this->consultaSQL($sql, $parametros)){
            $res = $this->cargarRegistro();
            $this->setId_hoja_vida($res['id_hoja_vida']);
            $this->setTbl_dependencias_id_dependencia($res['tbl_dependencias_id_dependencia']);
            $this->setEquipo_numero($res['equipo_numero']);
            $this->setTbl_marcas_id_marca($res['tbl_marcas_id_marca']);
            $this->setTbl_tipo_pc_id_tipo_pc($res['tbl_tipo_pc_id_tipo_pc']);
            $this->setFecha_compra($res['fecha_compra']);
            $this->setValor($res['valor']);
            $this->setFecha_expiracion_garantia($res['fecha_expiracion_garantia']);
            $this->setFecha_registrado($res['fecha_registrado']);
            $this->setTbl_tipo_pc_distribucion_id_tipo_pc_distribucion($res['tbl_tipo_pc_distribucion_id_tipo_pc_distribucion']);
            $this->setManija($res['manija']);
            $this->setPanel_frontal($res['panel_frontal']);
            $this->setIluminacion($res['iluminacion']);
            $this->setUnidades_opticas($res['unidades_opticas']);
            $this->setLector_multitarjetas($res['lector_multitarjetas']);
            $this->setCantidad_puertos_usb($res['cantidad_puertos_usb']);
            $this->setPuertos_video($res['puertos_video']);
            $this->setEthernet($res['ethernet']);
            $this->setPlug_audio($res['plug_audio']);
            $this->setCantidad_ps2($res['cantidad_ps2']);
            $this->setOtros_puertos($res['otros_puertos']);
            $this->setTbl_tipo_board_id_tipo_board($res['tbl_tipo_board_id_tipo_board']);
            $this->setTbl_tipo_fuente_id_tipo_fuente($res['tbl_tipo_fuente_id_tipo_fuente']);
            $this->setMarca_fuente($res['marca_fuente']);
            $this->setModelo_fuente($res['modelo_fuente']);
            $this->setVoltaje_fuente($res['voltaje_fuente']);
            $this->setWatt_fuente($res['watt_fuente']);
            $this->setTamano_monitor($res['tamano_monitor']);
            $this->setMarca_monitor($res['marca_monitor']);
            $this->setTbl_tipo_monitor_id_tipo_monitor($res['tbl_tipo_monitor_id_tipo_monitor']);
            $this->setMarca_dd($res['marca_dd']);
            $this->setCapacidad_dd($res['capacidad_dd']);
            $this->setSerial_dd($res['serial_dd']);
            $this->setTbl_tipo_dd_id_tipo_dd($res['tbl_tipo_dd_id_tipo_dd']);
            $this->setMarca_board($res['marca_board']);
            $this->setSerie_board($res['serie_board']);
            $this->setCapacidad_ram($res['capacidad_ram']);
            $this->setTbl_tipo_ram_id_tipo_ram($res['tbl_tipo_ram_id_tipo_ram']);
            $this->setVelocidad_ram($res['velocidad_ram']);
            $this->setRamas_expansion($res['ramas_expansion']);
            $this->setTarjetas_expansion($res['tarjetas_expansion']);
            $this->setFoto($res['foto']);
            $this->setSoftware($res['software']);
            $this->setObservaciones($res['observaciones']);
            $this->setTbl_clientes_id_cliente($res['tbl_clientes_id_cliente']);
            $this->desconectar();
        }
    }
    public function actualizar(){
        $campos = array("id_hoja_vida", "tbl_dependencias_id_dependencia", "equipo_numero", "tbl_marcas_id_marca", "tbl_tipo_pc_id_tipo_pc", "fecha_compra", "valor", "fecha_expiracion_garantia", "fecha_registrado", "tbl_tipo_pc_distribucion_id_tipo_pc_distribucion", "manija", "panel_frontal", "iluminacion", "unidades_opticas", "lector_multitarjetas", "cantidad_puertos_usb", "puertos_video", "ethernet", "plug_audio", "cantidad_ps2", "otros_puertos", "tbl_tipo_board_id_tipo_board", "tbl_tipo_fuente_id_tipo_fuente", "marca_fuente", "modelo_fuente", "voltaje_fuente", "watt_fuente", "tamano_monitor", "marca_monitor", "tbl_tipo_monitor_id_tipo_monitor", "marca_dd", "capacidad_dd", "serial_dd", "tbl_tipo_dd_id_tipo_dd", "marca_board", "serie_board", "capacidad_ram", "tbl_tipo_ram_id_tipo_ram", "velocidad_ram", "ramas_expansion", "tarjetas_expansion", "foto", "software", "observaciones", "tbl_clientes_id_cliente");
        $valores = array(
            $this->id_hoja_vida,
            $this->tbl_dependencias_id_dependencia,
            $this->equipo_numero,
            $this->tbl_marcas_id_marca,
            $this->tbl_tipo_pc_id_tipo_pc,
            $this->fecha_compra,
            $this->valor,
            $this->fecha_expiracion_garantia,
            $this->fecha_registrado,
            $this->tbl_tipo_pc_distribucion_id_tipo_pc_distribucion,
            $this->manija,
            $this->panel_frontal,
            $this->iluminacion,
            $this->unidades_opticas,
            $this->lector_multitarjetas,
            $this->cantidad_puertos_usb,
            $this->puertos_video,
            $this->ethernet,
            $this->plug_audio,
            $this->cantidad_ps2,
            $this->otros_puertos,
            $this->tbl_tipo_board_id_tipo_board,
            $this->tbl_tipo_fuente_id_tipo_fuente,
            $this->marca_fuente,
            $this->modelo_fuente,
            $this->voltaje_fuente,
            $this->watt_fuente,
            $this->tamano_monitor,
            $this->marca_monitor,
            $this->tbl_tipo_monitor_id_tipo_monitor,
            $this->marca_dd,
            $this->capacidad_dd,
            $this->serial_dd,
            $this->tbl_tipo_dd_id_tipo_dd,
            $this->marca_board,
            $this->serie_board,
            $this->capacidad_ram,
            $this->tbl_tipo_ram_id_tipo_ram,
            $this->velocidad_ram,
            $this->ramas_expansion,
            $this->tarjetas_expansion,
            $this->foto,
            $this->software,
            $this->observaciones,
            $this->tbl_clientes_id_cliente
        );
        $llaveprimaria = "id_hoja_vida";
        $valorllaveprimaria = $this->id_hoja_vida;
        $res = $this->actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria);
        $this->desconectar();
        return $res;
    }
    public function eliminar(){
        $sql = "DELETE FROM tbl_hoja_vida WHERE id_hoja_vida = :id_";
        $parametros = array(":id_"=>$this->id_hoja_vida);
        $res = $this->consultaSQL($sql,$parametros);
        $this->desconectar();
        return $res;
    }
    public function listar(){
        $sql = "SELECT * FROM tbl_hoja_vida";
        $this->consultaSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
    public function listarPorUsuario($cli){
        $sql = "SELECT * FROM tbl_hoja_vida WHERE tbl_clientes_id_cliente = :cli";
        $parametros = array(":cli"=>$cli);
        $this->consultaSQL($sql,$parametros);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
    public function actualizarFoto($archivo,$id){
      $sql = "UPDATE tbl_hoja_vida SET foto = :archivo WHERE id_hoja_vida = :id";
      $parametros = array(":id"=>$id,":archivo"=>$archivo);
      $res = $this->consultaSQL($sql,$parametros);
      $this->desconectar();
      return $res;
    }
}
?>