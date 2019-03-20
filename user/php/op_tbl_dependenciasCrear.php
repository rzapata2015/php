<?php
include('../../class/tbl_dependencias.php');

$resultado = array();

$tbl = new tbl_dependencias();
$tbl->setNombre_dependencia($_POST['nombre_dependencia']);

$resultado['resultado'] = $tbl->insertar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
