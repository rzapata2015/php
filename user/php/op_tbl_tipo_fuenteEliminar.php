<?php
include('../../class/tbl_tipo_fuente.php');

$resultado = array();

$tbl = new tbl_tipo_fuente($_POST['codigo']);
$tbl->consultar();


$resultado['resultado'] = $tbl->eliminar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
