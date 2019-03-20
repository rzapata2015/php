<?php
include('../../class/tbl_tipo_ram.php');

$resultado = array();

$tbl = new tbl_tipo_ram($_POST['id_tipo_ram']);
$tbl->consultar();

$tbl->setNombre_tipo_ram($_POST['nombre_tipo_ram']);

$resultado['resultado'] = $tbl->actualizar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
