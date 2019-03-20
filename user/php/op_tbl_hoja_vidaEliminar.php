<?php
include('../../class/tbl_hoja_vida.php');

$resultado = array();

$tbl = new tbl_hoja_vida($_POST['codigo']);
$tbl->consultar();


$resultado['resultado'] = $tbl->eliminar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
