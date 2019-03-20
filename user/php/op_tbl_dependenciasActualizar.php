<?php
include('../../class/tbl_dependencias.php');

$resultado = array();

$tbl = new tbl_dependencias($_POST['id_dependencia']);
$tbl->consultar();

$tbl->setNombre_dependencia($_POST['nombre_dependencia']);

$resultado['resultado'] = $tbl->actualizar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
