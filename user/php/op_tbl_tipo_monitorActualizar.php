<?php
include('../../class/tbl_tipo_monitor.php');

$resultado = array();

$tbl = new tbl_tipo_monitor($_POST['id_tipo_monitor']);
$tbl->consultar();

$tbl->setNombre_tipo_monitor($_POST['nombre_tipo_monitor']);

$resultado['resultado'] = $tbl->actualizar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
