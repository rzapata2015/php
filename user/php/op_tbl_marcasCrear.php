<?php
include('../../class/tbl_marcas.php');

$resultado = array();

$tbl = new tbl_marcas();
$tbl->setNombre_marca($_POST['nombre_marca']);

$resultado['resultado'] = $tbl->insertar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
