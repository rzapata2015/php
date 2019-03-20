<?php
include('../../class/tbl_hoja_vida.php');

$resultado = array();

$tbl = new tbl_hoja_vida();
$tbl->setTbl_dependencias_id_dependencia($_POST['tbl_dependencias_id_dependencia']);
$tbl->setEquipo_numero($_POST['equipo_numero']);
$tbl->setTbl_marcas_id_marca($_POST['tbl_marcas_id_marca']);
$tbl->setTbl_tipo_pc_id_tipo_pc($_POST['tbl_tipo_pc_id_tipo_pc']);
$tbl->setFecha_compra($_POST['fecha_compra']);
$tbl->setValor($_POST['valor']);
$tbl->setFecha_expiracion_garantia($_POST['fecha_expiracion_garantia']);
$tbl->setFecha_registrado($_POST['fecha_registrado']);
$tbl->setTbl_tipo_pc_distribucion_id_tipo_pc_distribucion($_POST['tbl_tipo_pc_distribucion_id_tipo_pc_distribucion']);
$tbl->setManija($_POST['manija']);
$tbl->setPanel_frontal($_POST['panel_frontal']);
$tbl->setIluminacion($_POST['iluminacion']);
$tbl->setUnidades_opticas($_POST['unidades_opticas']);
$tbl->setLector_multitarjetas($_POST['lector_multitarjetas']);
$tbl->setCantidad_puertos_usb($_POST['cantidad_puertos_usb']);
$tbl->setPuertos_video($_POST['puertos_video']);
$tbl->setEthernet($_POST['ethernet']);
$tbl->setPlug_audio($_POST['plug_audio']);
$tbl->setCantidad_ps2($_POST['cantidad_ps2']);
$tbl->setOtros_puertos($_POST['otros_puertos']);
$tbl->setTbl_tipo_board_id_tipo_board($_POST['tbl_tipo_board_id_tipo_board']);
$tbl->setTbl_tipo_fuente_id_tipo_fuente($_POST['tbl_tipo_fuente_id_tipo_fuente']);
$tbl->setMarca_fuente($_POST['marca_fuente']);
$tbl->setModelo_fuente($_POST['modelo_fuente']);
$tbl->setVoltaje_fuente($_POST['voltaje_fuente']);
$tbl->setWatt_fuente($_POST['watt_fuente']);
$tbl->setTamano_monitor($_POST['tamano_monitor']);
$tbl->setMarca_monitor($_POST['marca_monitor']);
$tbl->setTbl_tipo_monitor_id_tipo_monitor($_POST['tbl_tipo_monitor_id_tipo_monitor']);
$tbl->setMarca_dd($_POST['marca_dd']);
$tbl->setCapacidad_dd($_POST['capacidad_dd']);
$tbl->setSerial_dd($_POST['serial_dd']);
$tbl->setTbl_tipo_dd_id_tipo_dd($_POST['tbl_tipo_dd_id_tipo_dd']);
$tbl->setMarca_board($_POST['marca_board']);
$tbl->setSerie_board($_POST['serie_board']);
$tbl->setCapacidad_ram($_POST['capacidad_ram']);
$tbl->setTbl_tipo_ram_id_tipo_ram($_POST['tbl_tipo_ram_id_tipo_ram']);
$tbl->setVelocidad_ram($_POST['velocidad_ram']);
$tbl->setRamas_expansion($_POST['ramas_expansion']);
$tbl->setTarjetas_expansion($_POST['tarjetas_expansion']);
$tbl->setSoftware($_POST['software']);
$tbl->setObservaciones($_POST['observaciones']);
$tbl->setTbl_clientes_id_cliente($_POST['tbl_clientes_id_cliente']);

$resultado['resultado'] = $tbl->insertar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
