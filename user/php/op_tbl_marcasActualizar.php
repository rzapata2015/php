<?php
include('../../class/tbl_marcas.php');

$resultado = array();

$tbl = new tbl_marcas($_POST['id_marca']);
$tbl->consultar();

$tbl->setNombre_marca($_POST['nombre_marca']);

$resultado['resultado'] = $tbl->actualizar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
