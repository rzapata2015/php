<?php
include('../../class/tbl_tipo_pc_distribucion.php');

$resultado = array();

$tbl = new tbl_tipo_pc_distribucion($_POST['id_tipo_pc_distribucion']);
$tbl->consultar();

$tbl->setNombre_tipo_distribucion($_POST['nombre_tipo_distribucion']);

$resultado['resultado'] = $tbl->actualizar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
