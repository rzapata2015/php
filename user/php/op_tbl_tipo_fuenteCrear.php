<?php
include('../../class/tbl_tipo_fuente.php');

$resultado = array();

$tbl = new tbl_tipo_fuente();
$tbl->setNombre_fuente_poder($_POST['nombre_fuente_poder']);

$resultado['resultado'] = $tbl->insertar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
