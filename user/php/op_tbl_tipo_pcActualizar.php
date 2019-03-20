<?php
include('../../class/tbl_tipo_pc.php');

$resultado = array();

$tbl = new tbl_tipo_pc($_POST['id_tipo_pc']);
$tbl->consultar();

$tbl->setNombre_tipo_pc($_POST['nombre_tipo_pc']);

$resultado['resultado'] = $tbl->actualizar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
