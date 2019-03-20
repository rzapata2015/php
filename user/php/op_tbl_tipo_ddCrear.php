<?php
include('../../class/tbl_tipo_dd.php');

$resultado = array();

$tbl = new tbl_tipo_dd();
$tbl->setNombre_tipo_dd($_POST['nombre_tipo_dd']);

$resultado['resultado'] = $tbl->insertar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
